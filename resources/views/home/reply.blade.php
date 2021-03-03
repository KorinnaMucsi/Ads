@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <h1>Reply</h1>
            <ul class="list-group">
                <li  class="list-group-item">
                    <p>
                        Oglas: {{ $message->ad->title }}
                        <span class="float-right">{{ $message->created_at->format('d.m.y') }}</span>    
                    </p>
                    <p>From: {{ $message->sender->name }}</p>
                    <p><b>{{ $message->text }}</b></p>
                    <form action="{{ route('home.saveReply') }}" method="post">
                        @csrf
                        <input type="hidden" name="message_id" value="{{ $message->id }}">
                        <input type="hidden" name="receiver_id" value="{{ $message->sender_id }}">
                        <textarea class="form-control" name="msg" cols="30" rows="10">Reply message</textarea>
                        <button type="submit" class="form-control btn btn-primary mt-2">Send</button>
                    </form>
                </li>           
            </ul>
        </div>
    </div>
</div>
@endsection
