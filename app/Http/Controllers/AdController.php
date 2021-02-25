<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $all_ads = Ad::all();
        $categories = Category::all();
        return view('welcome', ['all_ads'=>$all_ads, 'categories'=>$categories]);
    }

    public function show(Ad $ad)
    {
        return view('singleAd', ['ad'=>$ad]);
    }
}
