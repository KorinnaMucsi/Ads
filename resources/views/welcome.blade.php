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
                    <a href="{{ route('welcome') }}?cat={{ $cat->id }}" class="text-light">{{ $cat->name }}</a>
                </li>                
            @endforeach
                <li class="list-group-item bg-secondary">
                    <form class="d-flex" action="{{ route('welcome') }}" method="GET">
                        @if (isset(request()->cat))
                            <input type="hidden" name="cat" value="{{ request()->cat }}">
                        @endif 
                        <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search" value="{{ (isset(request()->search)) ? request()->search : "" }}">
                        <button class="btn btn-success ml-2" type="submit">Search</button>
                      </form>
                </li>
                <li class="list-group-item bg-secondary">
                    <form action="{{ route('welcome') }}" method="GET" class="d-flex">
                        @if (isset(request()->cat))
                            <input type="hidden" name="cat" value="{{ request()->cat }}">
                        @endif  
                        @if (isset(request()->search))
                        <input type="hidden" name="search" value="{{ request()->search }}">
                        @endif                       
                        <select name="type" class="form-control" aria-label=".form-select-sm example">
                            <option value="lower" {{ (isset(request()->type) && request()->type == 'lower') ? 'selected' : '' }}>Price desc</option>
                            <option value="higher" {{ (isset(request()->type) && request()->type == 'higher') ? 'selected' : '' }}>Price asc</option>
                        </select>
                        <button class="btn btn-success ml-2" type="submit">Sort</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-9">
            <ul class="list-group list-group-flush">
                @foreach ($all_ads as $ad)                
                    <li class="list-group-item">
                        <a href="{{ route('showAd', ['ad'=>$ad->id]) }}">{{ $ad->title }}</a>                        
                        <span class="badge badge-warning float-right">Viewed: {{ $ad->views }}</span>
                        <span class="badge badge-primary ml-2">{{ $ad->price }} rsd</span>
                    </li>                
                @endforeach
                </ul>
        </div>
    </div>
@endsection