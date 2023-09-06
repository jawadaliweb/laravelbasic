

<title>About Page</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">
<!-- Place favicon.ico in the root directory -->
@include('frontend.body.topbar')
<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/default.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">


<body>



<!-- preloader-start -->
<div id="preloader">
<div class="rasalina-spin-box"></div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
<i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

<!-- header-area -->
@include('frontend.body.header')
<!-- header-area-end -->

<!-- main-area -->
<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
<div class="container custom-container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-8 col-md-10">
    <div class="breadcrumb__wrap__content">
        <h2 class="title">About me</h2>
        <nav aria-label="breadcrdumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Me</li>
            </ol>
        </nav>
    </div>
</div>
</div>
</div>
<div class="breadcrumb__wrap__icon">
<ul>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>

</ul>
</div>
</section>
<!-- breadcrumb-area-end -->

<!-- about-area -->
<section class="about about__style__two">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
    <div class="about__image">
        <img src="{{ asset('upload/about_images/' . ( optional($aboutdata)->about_image ?  optional($aboutdata)->about_image : 'no_image.png')) }}" alt="">
    </div>
</div>
<div class="col-lg-6">
    <div class="about__content">
        <div class="section__title">
            <span class="sub-title">01 - About me</span>
            <h2 class="title">{{optional($aboutdata)->title}}</h2>
        </div>

        <p class="desc">{{optional($aboutdata)->Short_title}}</p>
        <a href="{{optional($aboutdata)->resume_link}}" class="btn">Download my resume</a>
    </div>
</div>
</div>
<div class="row">
<div class="col-12">
    <div class="about__info__wrap">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                    role="tab" aria-controls="about" aria-selected="true">About</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                    role="tab" aria-controls="skills" aria-selected="false">Skills</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                    role="tab" aria-controls="education" aria-selected="false">education</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <div class="desc" id="description-container">{!! optional($aboutdata)->description !!}</div>



  
            </div>
            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="about__skill__wrap">
                    <div class="row">
                        @foreach ($skillsData as $skill)
                        <div class="col-md-5">
                            <div class="about__skill__item">
                                <h5 class="title">{{ $skill->title }}</h5>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $skill->percentage }}%;" aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"><span class="percentage">{{ $skill->percentage }}%</span></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
  
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                <div class="about__education__wrap">
                    <div class="row">
                        @foreach($EducationData as $Data)
                        <div class="col-md-6">
                            <div class="about__education__item">
                                <h3 class="title">{{$Data->title}}</h3>
                                <span class="date">{{date('Y', strtotime($Data->from_date))}} – {{date('Y', strtotime($Data->to_date))}}</span>
                            
                                {{-- calculate experience --}}
                            @php
                                $fromYear = date('Y', strtotime($Data->from_date));
                                $toYear = date('Y', strtotime($Data->to_date));
                                $duration = $toYear % $fromYear;
                             @endphp
                             
                               <span class="date">Experience: {{$duration}} Years</span>
                                <p>{{$Data->description}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- about-area-end -->

<!-- services-area -->
<section class="services__style__two">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6 col-md-8">
    <div class="section__title text-center">
        <span class="sub-title">02 - my Services</span>
        <h2 class="title">Provide awesome service</h2>
    </div>
</div>
</div>
<div class="services__style__two__wrap">
<div class="row gx-0">
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon01.png') }}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Business Strategy</a></h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/ assets/img/icons/services_light_icon02.png ') }}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon03.png') }}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Product Design</a></h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon05.png') }}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Animation</a></h3>
                <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon06.png')}}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Marketing</a></h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon05.png')}}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Brand strategy</a></h3>
                <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon04.png')}}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Graphic Design</a></h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="services__style__two__item">
            <div class="services__style__two__icon">
                <img src="{{ asset('frontend/assets/img/icons/services_light_icon07.png')}}" alt="">
            </div>
            <div class="services__style__two__content">
                <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                <p>Strategy is a forward-looking plan for your brand’s behavior.Strategy is a forward-looking plan.</p>
                <a href="services-details.html" class="services__btn"><i class="far fa-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- services-area-end -->

<!-- testimonial-area -->
<section class="testimonial testimonial__style__two">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-9 col-lg-11">
    <div class="testimonial__wrap">
        <div class="section__title text-center">
            <span class="sub-title">06 - Client Feedback</span>
            <h2 class="title">Some happy clients feedback</h2>
        </div>
        <div class="testimonial__two__active">
            <div class="testimonial__item">
                <div class="testimonial__icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <div class="testimonial__content">
                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                    <div class="testimonial__avatar">
                        <span>WPBakery/ uSA</span>
                        <div class="testi__avatar__img">
                            <img src="{{ asset('frontend/assets/img/images/testi_avatar01.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial__item">
                <div class="testimonial__icon">
                    <i class="fas fa-quote-left"></i>
                </div>
                <div class="testimonial__content">
                    <p>We are motivated by the satisfaction of our clients. Put your trust in us &share in our H.Spond Asset Management is made up of a team of expert, committed and experienced people with a passion for financial markets. Our goal is to achieve continuous.</p>
                    <div class="testimonial__avatar">
                        <span>Adobe Photoshop</span>
                        <div class="testi__avatar__img">
                            <img src="{{ asset('frontend/assets/img/images/testi_avatar02.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial__arrow"></div>
    </div>
</div>
</div>
</div>
<div class="testimonial__two__icons">
<ul>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape01.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape02.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape03.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape04.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape05.png') }}" alt=""></li>
<li><img src="{{ asset('frontend/assets/img/icons/testi_shape06.png') }}" alt=""></li>

</ul>
</div>
</section>
<!-- testimonial-area-end -->

<!-- blog-area -->
<section class="blog blog__style__two">
<div class="container">
<div class="row gx-0 justify-content-center">
<div class="col-lg-4 col-md-6 col-sm-9">
    <div class="blog__post__item">
        <div class="blog__post__thumb">
            <a href="blog-details.html"><img src="{{ asset('assets/img/blog/blog_post_thumb01.jpg') }}" alt=""></a>
            <div class="blog__post__tags">
                <a href="blog.html">Story</a>
            </div>
        </div>
        <div class="blog__post__content">
            <span class="date">13 january 2021</span>
            <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's new in design</a></h3>
            <a href="blog-details.html" class="read__more">Read mORe</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-9">
    <div class="blog__post__item">
        <div class="blog__post__thumb">
            <a href="blog-details.html"><img src="{{ asset('assets/img/blog/blog_post_thumb02.jpg')}}" alt=""></a>
            <div class="blog__post__tags">
                <a href="blog.html">Social</a>
            </div>
        </div>
        <div class="blog__post__content">
            <span class="date">13 january 2021</span>
            <h3 class="title"><a href="blog-details.html">Make communication Fast and Effectively.</a></h3>
            <a href="blog-details.html" class="read__more">Read mORe</a>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-9">
    <div class="blog__post__item">
        <div class="blog__post__thumb">
            <a href="blog-details.html"><img src="{{ asset('assets/img/blog/blog_post_thumb03.jpg')}}" alt=""></a>
            <div class="blog__post__tags">
                <a href="blog.html">Work</a>
            </div>
        </div>
        <div class="blog__post__content">
            <span class="date">13 january 2021</span>
            <h3 class="title"><a href="blog-details.html">How to increase your productivity at work - 2021</a></h3>
            <a href="blog-details.html" class="read__more">Read mORe</a>
        </div>
    </div>
</div>
</div>
<div class="blog__button text-center">
<a href="blog.html" class="btn">more blog</a>
</div>
</div>
</section>
<!-- blog-area-end -->

<!-- contact-area -->
<section class="homeContact">
<div class="container">
<div class="homeContact__wrap">
<div class="row">
    <div class="col-lg-6">
        <div class="section__title">
            <span class="sub-title">07 - Say hello</span>
            <h2 class="title">Any questions? Feel free <br> to contact</h2>
        </div>
        <div class="homeContact__content">
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="homeContact__form">
            <form action="#">
                <input type="text" placeholder="Enter name*">
                <input type="email" placeholder="Enter mail*">
                <input type="number" placeholder="Enter number*">
                <textarea name="message" placeholder="Enter Massage*"></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</section>
<!-- contact-area-end -->

</main>
<!-- main-area-end -->



<!-- Footer-area -->
<footer class="footer">
<div class="container">
<div class="row justify-content-between">
<div class="col-lg-4">
<div class="footer__widget">
    <div class="fw-title">
        <h5 class="sub-title">Contact us</h5>
        <h4 class="title">+81383 766 284</h4>
    </div>
    <div class="footer__widget__text">
        <p>There are many variations of passages of lorem ipsum
        available but the majority have suffered alteration
        in some form is also here.</p>
    </div>
</div>
</div>
<div class="col-xl-3 col-lg-4 col-sm-6">
<div class="footer__widget">
    <div class="fw-title">
        <h5 class="sub-title">my address</h5>
        <h4 class="title">AUSTRALIA</h4>
    </div>
    <div class="footer__widget__address">
        <p>Level 13, 2 Elizabeth Steereyt set <br> Melbourne, Victoria 3000</p>
        <a href="mailto:noreply@envato.com" class="mail">noreply@envato.com</a>
    </div>
</div>
</div>
<div class="col-xl-3 col-lg-4 col-sm-6">
<div class="footer__widget">
    <div class="fw-title">
        <h5 class="sub-title">Follow me</h5>
        <h4 class="title">socially connect</h4>
    </div>
    <div class="footer__widget__social">
        <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
        <ul class="footer__social__list">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-behance"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
</div>
</div>
</div>
<div class="copyright__wrap">
<div class="row">
<div class="col-12">
    <div class="copyright__text text-center">
        <p>Copyright @ Theme_Pure 2021 All right Reserved</p>
    </div>
</div>
</div>
</div>
</div>
</footer>
<!-- Footer-area-end -->






<!-- JS here -->
<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/element-in-view.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>
</html>
