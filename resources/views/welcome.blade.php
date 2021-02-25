@extends('layouts.master')
@section('title')
    Welcome
@endsection
@section('main')
    <h1>All ads</h1>
    <div class="row">
        <div class="col-3 bg-secondary">
            <ul class="list-group list-group-flush">
            @foreach ($categories as $cat)                
                <li class="list-group-item bg-secondary">
                    <a href="" class="text-light">{{ $cat->name }}</a>
                </li>                
            @endforeach
            </ul>
        </div>
        <div class="col-9">
            <ul class="list-group list-group-flush">
                @foreach ($all_ads as $ad)                
                    <li class="list-group-item">
                        <a href="{{ route('showAd', ['ad'=>$ad->id]) }}">{{ $ad->title }}</a>
                    </li>                
                @endforeach
                </ul>
        </div>
    </div>
@endsection