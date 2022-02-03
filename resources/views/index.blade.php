@extends('app.layout')
        <!-- header-end -->
@section('mainContent')
    <!-- offcanvas-start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index-2.html">
                <img src="img/logo/logo.png" alt="" />
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>123/A, Miranda City Likaoli
                    Prikano, Dope</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+0989 7876 9865 9</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@example.com</p>
            </div>
        </div>
        @if($social_links)
        <div class="social-icon-right mt-20">
            @foreach($social_links as $social)
                <a href="{{ $social->social_url }}"><i class="{{ $social->social_icon }}"></i></a>
            @endforeach
        </div>
        @endif
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
</header>
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
                                @if($social_links)
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        @foreach ($social_links as $item)
                                            
                                        <li><a href="{{ $item->social_url }}"><i class="{{ $item->social_icon }}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
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
                               @if($educations) <h3>Education:</h3> @endif
                            </div>
                            <!-- Education Item -->
                            @if($educations)
                            @php 
                                $num = 10;
                            @endphp
                            @foreach($educations as $edu)
                            <div class="education">
                                <div class="year">{{ $edu->passing_year }}</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>{{ $edu->certification }}</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: {{ $edu->result_gpa}}%;" aria-valuenow="{{ $edu->result_gpa }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
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
            @if($funs)
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            @foreach($funs as $fun)
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="{{ $fun->icon }}"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">{{ $fun->counter_number }}</span></h2>
                                        <span>{{ $fun->title }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endif
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
            @if($brands)
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        @foreach($brands as $key=>$brand)
                        @php 
                        $i = $key;
                        @endphp
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('uploads/brands/'.$brand->brand_image) }}" alt="img">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
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
      