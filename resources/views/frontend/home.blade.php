@extends('frontend.layouts.master')


@section('content')
<div class="th-hero-wrapper hero-5" id="hero">
    <div class="container">
        <div class="hero-style5">
            <h1 class="hero-title"> <span class="hero-title2">Finding the job </span> beyond borders</h1>
            <p class="hero-text">A job portal provides a platform for employers to post job vacancies & for job seekers
                to browse and apply for available positions.</p>
            <form action="mail.php" method="POST" class="hero-form ajax-contact">
                <div class="row justify-content-between">
                    <div class="form-group col-7 col-md-auto">
                        <i class="fa-light fa-magnifying-glass"></i>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Search job title.......">
                    </div>
                    <div class="form-group col-5 col-md-4">
                        <select name="subject" id="subject" class="form-select nice-select">
                            <option value="" disabled selected hidden>Location</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Germany">Germany</option>

                        </select>
                    </div>
                    <div class="form-btn col-12 col-md-auto">
                        <button class="th-btn">Search Now</button>
                    </div>
                </div>
                <p class="form-messages mb-0 mt-3"></p>
            </form>
        </div>
        <div class="th-hero-thumb">
            <img src="{{ asset('frontend/assets/img/hero/hero_img_4_1.png')}}" alt="img">
            <div class="hero5-shape jump"><img src="{{ asset('frontend/assets/img/shape/hero5-shape.png')}}" alt=""></div>
            <div class="shape-mockup jump" data-ani-delay="0.2s" data-top="15%" data-left="-26%"><img src="{{ asset('frontend/assets/img/shape/logo-1.png')}}" alt=""></div>
            <div class="shape-mockup movingX" data-ani-delay="0.4s" data-top="5%" data-left="17%"><img src="{{ asset('frontend/assets/img/shape/logo-2.png')}}" alt=""></div>
            <div class="shape-mockup movingX" data-ani-delay="0.6s" data-top="15%" data-right="7%"><img src="{{ asset('frontend/assets/img/shape/logo-3.png')}}" alt="">
            </div>
            <div class="shape-mockup jump" data-ani-delay="0.8s" data-top="28%" data-right="-20%"><img src="{{ asset('frontend/assets/img/shape/logo-4.png')}}" alt="">
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xxl-block" data-top="0%" data-right="-1%"><img src="{{ asset('frontend/assets/img/shape/hero5-shape2.png')}}" alt=""></div>
    <div class="shape-mockup hero5-shape  d-none d-xl-block" data-top="15%" data-right="4%"><img src="{{ asset('frontend/assets/img/shape/hero5-line.png')}}" alt=""></div>
</div>
<!--======== / Hero Section ========-->

<!--============================== Brand Area  ==============================-->
<div class="brand-sec3 bg-title overflow-hidden space-extra2">
    <div class="container">
        <div class="slider-area text-center">
            <div class="swiper th-slider brand-slider3" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_1.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_2.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_3.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_4.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_5.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_6.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_1.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_2.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_3.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_4.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_5.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="about.html" class="brand-box2">
                            <img src="{{ asset('frontend/assets/img/brand/brand_3_6.svg')}}" alt="Brand Logo">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div><!--==============================
Cta Area  
==============================-->
<section class="space-top">
    <div class="container">
        <div class="cta-area4">
            <div class="cta-image1">
                <img src="{{ asset('frontend/assets/img/normal/cta-img1.png')}}" alt="">
            </div>
            <div class="hiring-cta">
                <div>
                    <span class="box-subtitle">WE ARE</span>
                    <h3 class="box-title">HIRING</h3>
                </div>
                <p class="box-text">Let’s Work Together & Explore Opportunities</p>
                <a href="contact.html" class="th-btn">Apply Now</a>
            </div>
            <div class="cta-image2">
                <img src="{{ asset('frontend/assets/img/normal/cta-img2.png')}}" alt="">
            </div>
        </div>
    </div>
</section><!--==============================
Process Area  
==============================-->
<section class="process-area5 space" id="process-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title3">Working Process</span>
            <h2 class="sec-title">How It Works!</h2>
        </div>
        <div class="row gy-5">
            <div class="col-md-6 col-xl-4 process-card-wrap">
                <div class="process-grid">
                    <div class="box-icon" data-mask-src="{{ asset('frontend/assets/img/shape/process-icon.png')}}">
                        <img src="{{ asset('frontend/assets/img/icon/process_1_1.svg')}}" alt="icon">
                    </div>
                    <div class="box-wrapp">
                        <h2 class="box-title">Register <span> Your Account</span></h2>
                        <div class="box-number">01</div>
                    </div>
                    <p class="box-text">You need to create an account to find the best and preferred job. early apply here!</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 process-card-wrap">
                <div class="process-grid">
                    <div class="box-icon" data-mask-src="{{ asset('frontend/assets/img/shape/process-icon.png')}}">
                        <img src="{{ asset('frontend/assets/img/icon/process_1_2.svg')}}" alt="icon">
                    </div>
                    <div class="box-wrapp">
                        <h2 class="box-title">Upload <span> Your Resume</span></h2>
                        <div class="box-number">02</div>
                    </div>
                    <p class="box-text">You need to create an account to find the best and preferred job. early apply here!</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 process-card-wrap">
                <div class="process-grid">
                    <div class="box-icon" data-mask-src="{{ asset('frontend/assets/img/shape/process-icon.png')}}">
                        <img src="{{ asset('frontend/assets/img/icon/process_1_3.svg')}}" alt="icon">
                    </div>
                    <div class="box-wrapp">
                        <h2 class="box-title">Apply <span> For Dream Job</span></h2>
                        <div class="box-number">03</div>
                    </div>
                    <p class="box-text">You need to create an account to find the best and preferred job. early apply here!</p>
                </div>
            </div>
        </div>
    </div>
</section><!--==============================
appointment Area  
==============================-->
<section class="appointment-area space" data-pos-for=".guideline-area" data-sec-pos="bottom-half">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-7">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title sub-title3 style1 text-white">Browse Job Category</span>
                    <h2 class="sec-title text-white">Browse Popular Job Categories</h2>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn">
                    <a href="contact.html" class="th-btn style8">Browse All Categories</a>
                </div>
            </div>
        </div>
        <div class="nav nav-tabs appointment-tabs" id="nav-tab" role="tablist">
            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-1.svg')}}" alt=""><span class="box-title">UI/UX Design<span>12k+ Job Available</span></span></button>

            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-2.svg')}}" alt=""><span class="box-title">Developments <span>12k+ Job Available</span></span></button>

            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-3.svg')}}" alt=""><span class="box-title">Sales Marketing <span>12k+ Job Available</span></span></button>

            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-4.svg')}}" alt=""><span class="box-title">Health & Care<span>12k+ Job Available</span></span></button>
            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-5.svg')}}" alt=""><span class="box-title">Digital Finance<span>12k+ Job Available</span></span></button>
            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-6.svg')}}" alt=""><span class="box-title">Digital Banking<span>12k+ Job Available</span></span></button>
            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-7.svg')}}" alt=""><span class="box-title">Customer Help<span>12k+ Job Available</span></span></button>
            <button class="nav-link"><img src="{{ asset('frontend/assets/img/icon/s-7.svg')}}" alt=""><span class="box-title">IT Technology<span>12k+ Job Available</span></span></button>
        </div>
    </div>
</section><!--==============================
Faq Area
==============================-->
<div class="guideline-area  overflow-hidden space" id="faq-sec" data-bg-src="{{ asset('frontend/assets/img/bg/guideline_bg_1.jpg')}}">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-xl-6">
                <div class="">
                    <div class="title-area mb-40 text-center text-xl-start">
                        <span class="sub-title sub-title3 style1">Some Guideline</span>
                        <h2 class="sec-title">It’s easy to find Someone</h2>
                        <p>ob seekers can search for relevant job opportunities using various filters such as location, industry, job type, salary range, and keywords. Advanced search options may include filters for experience level, education, and specific skills..</p>
                    </div>
                    <div class="guideline-item">
                        <span class="box-number">1</span>
                        <h3 class="box-title">First of all Build a Strong Profile.</h3>
                    </div>
                    <div class="guideline-item">
                        <span class="box-number">2</span>
                        <h3 class="box-title">Discover Job You Have.</h3>
                    </div>
                    <div class="guideline-item">
                        <span class="box-number">3</span>
                        <h3 class="box-title">Apply Direct To Terms.</h3>
                    </div>
                    <div class="guideline-item">
                        <span class="box-number">4</span>
                        <h3 class="box-title">You Can Direct Knock.</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mt-35 mt-xl-0">
                <div class="guideline-wrapp">
                    <div class="guideline-img2 tilt-active">
                        <img src="{{ asset('frontend/assets/img/normal/guidline.png')}}" alt="Faq">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--==============================
Career Area
==============================-->
<div class="space overflow-hidden ">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title3">Job Post</span>
            <h2 class="sec-title">Feature Job Offers</h2>
        </div>
        <div class="row gy-30">
            <!--==============================
Career Area
==============================-->

            <!-- *******************************88888888 -->

            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>1 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">Senior UI/UX Designer</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Webteck</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>2 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">Java Software Engineer</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo2.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Softech</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>2 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">Senior System Engineer</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo3.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Dailymotion</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>1 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">Product Manager, Studio</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo4.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Periscope</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>2 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">Digital Marketing Manager</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo5.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Nintendo</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-xxl-4">
                <div class="job-post">
                    <div class="job-content">
                        <div class="job-post_date">
                            <span class="date"><i class="fa-regular fa-clock"></i>1 Days Ago</span>
                            <div class="icon"><i class="fa-regular fa-bookmark"></i></div>
                        </div>
                        <h3 class="box-title">React Native Web Developer</h3>
                        <span class="location"><i class="fa-regular fa-location-dot me-2"></i>United States</span>
                        <span class="location"><i class="fa-light fa-briefcase me-2"></i>Full Time</span>
                    </div>
                    <div class="job-post_author">
                        <div class="job-wrapp">
                            <div class="job-author">
                                <img src="{{ asset('frontend/assets/img/normal/career-logo6.png')}}" alt="Image">
                            </div>
                            <div class="author-info">
                                <h3 class="company-name">By Webteck</h3>
                                <h5 class="price">$1000 - $ 1200<span class="duration">/Month</span></h5>

                            </div>
                        </div>
                        <a class="th-btn style5" href="job-details.html">Apply Now</a>
                    </div>
                </div>
            </div>



            <!-- *********************************%^&%&*^&*(76578997) -->
        </div>
        <div class="text-center mt-50"><span class="bottom-btn"><a class="th-btn" href="job.html">See More Jobs</a>
            </span></div>
    </div>
</div>
<div class="cta-sec5 overflow-hidden" data-bg-src="{{ asset('frontend/assets/img/bg/cta_bg_5.png')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="space">
                    <div class="title-area mb-20">
                        <h2 class="sec-title">Get Over Best 40,000+ Talented and Expert Job Holder !</h2>
                        <p class="sec-text4">Job portals often include features for job seekers to track their job
                            applications, view
                            application status,</p>
                    </div>
                    <div class="checklist style8 mb-40">
                        <ul>
                            <li><i class="fa-solid fa-circle-check"></i>Get top 90% experts of your project
                            </li>
                        </ul>
                    </div>
                    <a href="#" class="th-btn">+ Post a Job</a>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="cta-image5">
                    <div><img src="{{ asset('frontend/assets/img/normal/cta-img5.png')}}" alt=""></div>
                    <div class="cta-shape"></div>
                    <div class="cta-hiring" data-bg-src="{{ asset('frontend/assets/img/shape/cta-shape1.png')}}">
                        <span class="box-subtitle">We Are</span>
                        <h3 class="box-title">HIRING</h3>
                    </div>
                    <div class="th-experience dance">
                        <div class="th-experience_content">
                            <h2 class="experience-year"><span class="counter-number">10</span>K+</h2>
                            <p class="experience-text">Our Happy Job Candidate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--==============================
Testimonial Area  
==============================-->
<section class="overflow-hidden space" id="testi-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title-area text-center">
                    <span class="sub-title sub-title3">Testimonials</span>
                    <h2 class="sec-title">What Our Customers Say About Us</h2>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider3" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1300":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">“Job portals often provide resources and tools to support job seekers in their job search process, including resume writing tips, interview preparation guides, career advice articles, and webinars or workshops on professional development topics.”</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_1.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">David Ade Smith</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">A professional networking site that also serves as a job portal where users can create profiles, network with professionals, and apply for jobs posted by companies. One of the largest job portals globally, Indeed aggregates job listings</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_2.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">Abraham Khalil</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">“Job portals are websites or online platforms that facilitate job hunting and recruitment processes. They serve as a central hub where employers can post job vacancies and job seekers can search for jobs, and manage their careers”</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_1.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">David Ade Smith</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">“Job portals often provide resources and tools to support job seekers in their job search process, including resume writing tips, interview preparation guides, career advice articles, and webinars or workshops on professional development topics.”</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_1.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">Abraham Khalil</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">A professional networking site that also serves as a job portal where users can create profiles, network with professionals, and apply for jobs posted by companies. One of the largest job portals globally, Indeed aggregates job listings</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_2.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">David Ade Smith</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item th-ani">
                            <p class="box-text">“Job portals are websites or online platforms that facilitate job hunting and recruitment processes. They serve as a central hub where employers can post job vacancies and job seekers can search for jobs, and manage their careers”</p>
                            <div class="box-profile">
                                <div class="box-author">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testi_4_1.png')}}" alt="Avater">
                                </div>
                                <div class="box-info">
                                    <h3 class="box-title">Abraham Khalil</h3>
                                    <span class="box-desig">Business Student</span>
                                    <div class="box-review">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button data-slider-prev="#testiSlide5" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#testiSlide5" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section><!--==============================
Cta Area  
==============================-->
<section class="cta-area2" data-bg-src="{{ asset('frontend/assets/img/bg/cta_bg_1.jpg')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8">
                <div class="cta-title-area space text-center text-xl-start">
                    <div class="title-area mb-50">
                        <h2 class="sec-title text-white">Get Your Dream Job, Just by Uploading your CV</h2>
                    </div>
                    <div class="">
                        <a href="#" class="th-btn style8"><i class="fa-regular fa-download me-2"></i>Upload CV</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="cta-wrapp">
                    <div class="cta-image">
                        <img src="{{ asset('frontend/assets/img/normal/cta-img3.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--==============================
Blog Area  
==============================-->
<section class="blog-area overflow-hidden bg-white space" id="blog-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title3">News & Blog</span>
            <h2 class="sec-title">Latest Release News & Articles</h2>
        </div>

        <div class="slider-area">
            <div class="swiper th-slider has-shadow" id="blogSlider5" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_1.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>10 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">Make more productive work flow in few steps.</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_2.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>15 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">6 Tips for Personal Selling in that Guarantee Success</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_3.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>16 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">8 Things About Web Design Your Boss Wants To Know</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_1.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>17 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">How Chatbots Can Help You Drive More Sales</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_2.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>19 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">6 Tips for Personal Selling in that Guarantee Success</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="blog-grid">
                            <div class="box-img global-img">
                                <img src="{{ asset('frontend/assets/img/blog/blog_3_3.jpg')}}" alt="blog image">
                            </div>
                            <div class="box-content">
                                <div class="blog-meta">
                                    <a href="blog.html"><i class="far fa-calendar"></i>20 Aug, 2024</a>
                                    <a href="blog.html"><i class="fa-regular fa-clock"></i>08 min read</a>
                                </div>
                                <h3 class="box-title"><a href="blog-details.html">8 Things About Web Design Your Boss Wants To Know</a></h3>
                                <a href="blog-details.html" class="line-btn">Read Details<i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button data-slider-prev="#blogSlider5" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#blogSlider5" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>
        </div>

    </div>

</section>

@endsection