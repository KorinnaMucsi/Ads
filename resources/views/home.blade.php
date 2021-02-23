@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <h1>All Ads by: {{ Auth::user()->name }}</h1>
            <ul class="list-group list-group-flush">
                @foreach ($all_ads as $ad)
                    <li  class="list-group-item bg-light">
                        <a href="{{ route('home.singleAd', ['ad'=>$ad->id]) }}" class="list-group-item-action">
                            {{ $ad->title }}
                        </a>
                    </li>
                @endforeach                
            </ul>
        </div>
    </div>
</div>
@endsection
