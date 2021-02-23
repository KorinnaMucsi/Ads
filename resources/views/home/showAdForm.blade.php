@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <form action="{{ route('home.saveAd') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" id="title" placeholder="title" class="form-control"><br>
                <textarea name="body" id="body" cols="30" rows="10" placeholder="body" class="form-control"></textarea><br>
                <input type="number" name="price" id="price" placeholder="price" class="form-control"><br>
                <input type="file" name="image1" id="image1" class="form-control">
                <input type="file" name="image2" id="image2" class="form-control">
                <input type="file" name="image3" id="image3" class="form-control"><br>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
