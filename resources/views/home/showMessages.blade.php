@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <h1>All messages</h1>
            <ul class="list-group">
                @foreach ($all_msgs as $msg)
                    <li class="list-group-item">
                        <p>
                            Oglas: {{ $msg->ad->title }}
                            <span class="float-right">{{ $msg->created_at->format('d.m.y') }}</span>    
                        </p>
                        <p>From: {{ $msg->sender->name }}</p>
                        <p><b>{{ $msg->text }}</b></p>
                        <a href="{{ route('home.reply', ['msg'=>$msg]) }}">Reply</a>
                    </li>
                @endforeach                
            </ul>
        </div>
    </div>
</div>
@endsection
