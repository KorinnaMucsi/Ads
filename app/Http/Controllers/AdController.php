<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index()
    {
        $all_ads = new Ad;
        if (isset(request()->cat)) {
            $all_ads = Ad::whereHas('category', function($query){
                $query->where('category_id', request()->cat);
            });
        }

        if (isset(request()->search)) {
            $all_ads = $all_ads->where('title','like','%' . request()->search . '%');
        }

        if (isset(request()->type)) {
            $all_ads = $all_ads->orderBy('price', (request()->type == 'lower' ? 'desc' : 'asc'));
        }

        $all_ads = $all_ads->get();
        $categories = Category::all();
        return view('welcome', ['all_ads'=>$all_ads, 'categories'=>$categories]);
    }

    public function show(Ad $ad)
    {
        if (Auth::check() && Auth::user()->id !== $ad->user_id) {
            $ad->increment('views');
        }        
        return view('singleAd', ['ad'=>$ad]);
    }

    public function sendMessage(Request $request, Ad $ad)
    {
        dd($ad);
    }
}
