
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<style>
   .edit-button a, .edit-button {
            
            background-color: #007bff;
            color: #fff;
            padding: 0px 10px;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 15%;
            right: 50%;
            display: none;
            z-index: 100;
        
        }

.banner:hover .edit-button a, .edit-button
{

    display: inline;
}
    
.banner:hover{

 border: 2px solid #00000091;

}
   
.banner{

background-color: {{ $homedata->back_color }};
}
 
        
</style>

<section class="banner" style="height: 80vh; padding-top:10%;">
    <div class="container custom-container">
        @auth
        <button class="edit-button"> <a href="{{route('home.slider')}}"> Edit </a></button>   
            
        @endauth
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="banner__img text-center text-xxl-end">
            <img src="{{asset('upload/slider_images') . '/' . $homedata->home_image  }}" alt="">
        </div>
    </div>
    <div class="col-xl-5 col-lg-6">
        <div class="banner__content">
            <h2 class="title wow fadeInUp" data-wow-delay=".2s">{{ $homedata->tittle }}</h2>
            <p class="wow fadeInUp" data-wow-delay=".4s">{{ $homedata->description }}</p>
            <a href="about.html" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
        </div>
    </div>
    </div>
    </div>
    <div class="scroll__down">
    <a href="#aboutSection" class="scroll__link">Scroll down</a>
    </div>
    <div class="banner__video">
    <a href="{{$homedata->video_url}}" class="popup-video"><i class="fas fa-play"></i></a>
    </div>
    
</section>