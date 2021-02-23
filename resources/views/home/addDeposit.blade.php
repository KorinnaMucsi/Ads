@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <form action="{{ route('home.addDeposit') }}" method="POST">
                @csrf
                <label for="deposit">Deposit</label>
                <input type="number" name="deposit" id="deposit" placeholder="deposit" class="form-control"><br>
                @if ($errors->has('deposit'))
                    <p class="bg-warning p-1">{{ $errors->first('deposit') }}</p>
                @endif
                <button type="submit" class="btn btn-info">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
