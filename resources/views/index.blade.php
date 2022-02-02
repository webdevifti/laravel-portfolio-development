@extends('app.layout')
        <!-- header-end -->
@section('mainContent')
        <!-- main-area -->
        <main>
            @if($banners)

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">{{ $banners->sub_title }}</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">{{ $banners->title }}</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">{{ $banners->description }}</p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="{{ asset('uploads/banners/'.$banners->banner_image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="{{ asset('site_assets/img/shape/dot_circle.png') }}" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->
            @endif
            <!-- about-area-->
            @if($about_data)
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="{{ asset('uploads/abouts/'.$about_data->about_image) }}" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>{{ $about_data->sub_title }}</span>
                                <h2>{{ $about_data->title }}</h2>
                            </div>
                            <div class="about-content">
                                <p>{{ $about_data->description }}</p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year">2020</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>PHD of Interaction Design &amp; Animation</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year">2016</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>Master of Database Administration</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year">2010</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>Bachelor of Computer Engineering</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year">2005</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>Diploma of Computer</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- about-area-end -->

            <!-- Services-area -->
            @if($services)
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        @foreach($services as $service)
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="{{ $service->icon_class }}"></i>
								<h3>{{ $service->title }}</h3>
								<p>
									{{ $service->description }}
								</p>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</section>
            @endif
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            @if($portfolio_data)
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($portfolio_data as $portfolio_item)
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="{{ asset('uploads/portfolioes/'.$portfolio_item->portfolio_image) }}" alt="img">
								</div>
								<div class="speaker-overlay">
									<span>{{ $portfolio_item->category }}</span>
									<h4><a href="/work/{{ $portfolio_item->id }}/{{ $portfolio_item->portfolio_slug }}">{{ $portfolio_item->title }}</a></h4>
									<a href="/work/{{ $portfolio_item->id }}/{{ $portfolio_item->portfolio_slug }}" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-award"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">245</span></h2>
                                        <span>Feature Item</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-like"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">345</span></h2>
                                        <span>Active Products</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-event"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">39</span></h2>
                                        <span>Year Experience</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="flaticon-woman"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">3</span>k</h2>
                                        <span>Our Clients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            @if($testimonials)
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                @foreach($testimonials as $testimonial)
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="{{ asset('uploads/testimonials/'.$testimonial->client_image) }}" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span>{{ $testimonial->client_review }}<span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5>{{ $testimonial->client_name }}</h5>
                                            <span>{{ $testimonial->client_designation }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img01.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img02.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img03.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img04.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img05.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('site_assets/img/brand/brand_img03.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="#">
                                    <input type="text" placeholder="your name *">
                                    <input type="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn">BUY TICKET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

@endsection
      