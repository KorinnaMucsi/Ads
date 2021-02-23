@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            @include('home.partials.sidebar')
        </div>
        <div class="col-8">
            <h4>{{ $ad->title }}</h4>
            <div class="row">
                @if (isset($ad->image1))
                    <div class="col-6 offset-3 mb-1">
                        <img id="mainImg" src="/ad_images/{{ $ad->image1 }}" alt="" class="img-fluid img-thumbnail rounded">                    
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="row">
                        @if (isset($ad->image2))
                            <div class="col-6">                        
                                <img src="/ad_images/{{ $ad->image2 }}" alt="" class="thumb img-fluid img-thumbnail rounded">
                            </div>
                        @endif 
                        @if (isset($ad->image3))
                            <div class="col-6">                        
                                <img src="/ad_images/{{ $ad->image3 }}" alt="" class="thumb img-fluid img-thumbnail rounded">
                            </div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script>
        let thumbImages = document.getElementsByClassName("thumb");
        for (let i = 0; i < thumbImages.length; i++) {
            const thumbImage = thumbImages[i];
            thumbImage.addEventListener('click', function(){
                let mainImage = document.getElementById("mainImg");
                let mainImgSrc = mainImage.getAttribute('src');
                let clickedImgSrc = this.getAttribute('src');
                mainImage.setAttribute('src', clickedImgSrc);
                this.setAttribute('src', mainImgSrc);
            })            
        }
    </script>
@endsection
