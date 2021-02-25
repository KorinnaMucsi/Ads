@extends('layouts.master')

@section('title')
    Single Ad
@endsection

@section('main')
    <div class="row">
        @if (isset($ad->image1))
            <div class="col-4">
                <div class="card h-100">                        
                    <img src="/ad_images/{{$ad->image1}}" class="mx-auto img-fluid">
                </div>
            </div>
        @endif
        @if (isset($ad->image2))
            <div class="col-4">
                <div class="card h-100">
                    <img src="/ad_images/{{$ad->image2}}" class="mx-auto img-fluid">
                </div>
            </div>
        @endif
        @if (isset($ad->image3))
            <div class="col-4">
                <div class="card h-100">
                    <img src="/ad_images/{{$ad->image3}}" class="mx-auto img-fluid">
                </div>
            </div>
        @endif
        </div>
    <div class="row">
        <div class="col-12">
            <h1>{{ $ad->title }} <span class="btn btn-success">{{ $ad->category->name }}</span></h1>
            
            <p>{{ $ad->body }}</p>
        </div>
    </div>

@endsection