<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDepositRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$all_ads = Ad::where('user_id', Auth::user()->id)->get();
        //$all_ads = DB::table('ads')->where('user_id', Auth::user()->id)->get();
        //$all_ads = DB::select("SELECT * FROM ads WHERE user_id=" . Auth::user()->id);
        $all_ads = Auth::user()->ads;
        return view('home', ['all_ads'=>$all_ads]);
    }

    public function addDeposit()
    {
        return view('home.addDeposit');
    }

    public function updateDeposit(UpdateDepositRequest $request)
    {
        $user = Auth::user();

        //Amikor sajat request-et hasznalunk
        $request->validated();

        //Amikor az eredeti Request $request parametert hasznaljuk
        // $request->validate([
        //     'deposit' => 'required|max:4'
        // ],
        // [
        //     'deposit.max' => 'Can\'t add more than 9999 rsd at once.'
        // ]);

        $user->deposit = $user->deposit + $request->deposit;
        $user->save();

        return redirect(route('home'));
    }

    public function showAdForm()
    {
        $categories = Category::all();
        return view('home.showAdForm', ['categories'=>$categories]);
    }

    public function saveAd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required | max:255',
            'price' => 'required',
            'image1' => 'mimes:jpg, jpeg, png',
            'image2' => 'mimes:jpg, jpeg, png',
            'image3' => 'mimes:jpg, jpeg, png',
            'category' => 'required'
        ]);
        
        //Megnezzuk tartalmaz-e fajlt a request
        if ($request->hasFile('image1')) {
            //Amennyiben tartalmaz, kinyerjuk a fajlt
            $image1 = $request->file('image1');
            //Adunk neki nevet
            $image1_name = time() . '1.' . $image1->extension();
            //A request-bol kinyert fajlt atmasoljuk a public mappan belul az ad_images mappaba
            $image1->move(public_path('ad_images'), $image1_name);
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2_name = time() . '2.' . $image2->extension();
            $image2->move(public_path('ad_images'),$image2_name);
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3_name = time() . '3.' . $image3->extension();
            $image3->move(public_path('ad_images'),$image3_name);
        }

        Ad::create([
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'image1' => (isset($image1_name) ? $image1_name : null),
            'image2' => (isset($image2_name) ? $image2_name : null),
            'image3' => (isset($image3_name) ? $image3_name : null),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category
        ]);

        return redirect(route('home'));
    }

    public function singleAd(Ad $ad)
    {
        return view('home.singleAd', ['ad'=>$ad]);
    }

    public function showMessages()
    {
        $all_msgs = Message::where('receiver_id', Auth::user()->id)->get();
        return view('home.showMessages', ['all_msgs' => $all_msgs]);
    }

    public function reply(Request $request)
    {
        $message = Message::where('id', $request->msg)->first();
        return view('home.reply', ['message' => $message]);
    }

    public function saveReply(Request $request)
    {
        $message = Message::where('id', $request->message_id)->first();

        Message::create([
            'text' => $request->msg,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver_id,
            'ad_id' => $message->ad->id
        ]);

        return redirect(route('home.showMessages'))->with('message', 'Message sent.');
    }
}
