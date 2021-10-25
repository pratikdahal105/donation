@extends('frontend.layouts.main')
@section('content')
<div class="page-content">
    <div id="home-page">
        <section class="banner-section">
            <div class="custom-container">
                <div class="common-flex banner-container">
                    <div class="text-content item">
                        <div class="section-title">
                            <h1>Massa est sit etiam diam
                                sodales.</h1>
                        </div>
                        <div class="description">
                            <p>
                                In scelerisque tempus viverra mollis ullamcorper quis. Tristique praesent ante volutpat, ac
                                dolor massa ac a. Vestibulum, nibh leo.
                            </p>
                        </div>
                        <div class="progress-bar-wrapper common-progress-bar">
                            <div class="progress">
                                <div class="bar progress-bar-striped-custom" data-value="50000" max-value="100000">
                                    <div class="pct">
                                        50%
                                    </div>
                                </div>
                            </div>
                            <p>Rs. 1,00,000</p>
                        </div>
                        <div class="action">
                            <a href="#" class="covid-btn btn-red">Donate Now</a>
                        </div>
                    </div>
                    <div class="item banner-slider">
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="management-system-section">
            <div class="custom-container">
                <div class="management-container common-flex">
                    <div class="text-content item">
                        <div class="section-title">
                            <h1>Covid Management System</h1>
                        </div>
                        <div class="description">
                            <p>
                                Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat.
                                Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien
                                condimentum cras.
                            </p>
                        </div>
                        <div class="action">
                            <a href="#" class="covid-btn">View all services</a>
                        </div>
                    </div>
                    <div class="services-wrapper item">
                        <div class="service-item">
                            <a href="">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/04-Oxygen%20Tank.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </a>
                        </div>
                        <div class="service-item">
                            <a href="">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/07-Ambulance.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Ambulance Service</p>
                                </div>
                            </a>
                        </div>
                        <div class="service-item">
                            <a href="">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Medical Assistance</p>
                                </div>
                            </a>
                        </div>
                        <div class="service-item">
                            <a href="">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/blood.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Blood Availability</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="other-services-section">
            <div class="custom-container">
                <div class="services-container common-flex">
                    <div class="text-content item">
                        <div class="section-title">
                            <h1>Other Services</h1>
                        </div>
                        <div class="description">
                            <p>
                                Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras
                                quis consequat. Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis.
                                Laoreet iaculis posuere id sapien condimentum cras.
                            </p>
                        </div>
                        <div class="ation">
                            <a href="#" class="covid-btn">view all services</a>
                        </div>
                    </div>
                    <div class="other-service item">
                        <div class="other-services-wrapper">
                            <div class="inner">
                                <ul>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Food Delivery</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Oxygen Re-fill</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Medicine Delivery</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Ambulance</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Cooked Food</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Sanitize</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Logistics</li>
                                    <li><img src="{{asset('client_assets')}}/img/icons/tick.png" alt="">Cleaning</li>
                                </ul>
                            </div>
                        </div>
                        <div class="delivery-img-wrapper">
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/delivery-2.png" alt="">
                            </div>
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/delivery.png" alt="">
                            </div>
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/delivery-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ongoing-projects-section">
            <div class="custom-container">
                <div class="projects-container">
                    <div class="text-content">
                        <div class="section-title">
                            <h1>Ongoing Projects</h1>
                        </div>
                        <div class="description">
                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat.
                                Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien
                                condimentum cras.</p>
                        </div>
                    </div>
                    <div class="project-item-wrapper">
                        <div class="project-item">
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/streetshop.png" alt="">
                            </div>
                            <div class="text-content">
                                <div class="title">
                                    <h5>Id enim, turpis eu.</h5>
                                </div>
                                <div class="author">
                                    <h5>Jaydon Levin</h5>
                                </div>
                                <div class="description">
                                    <p>Euismod amet, quam cras a condimentum maecenas
                                        vestibulum, imperdiet pulvinar. Proin proin cras
                                        quis consequat. Vitae, laoreet commodo  </p>
                                </div>
                                <div class="progress-bar-wrapper common-progress-bar">
                                    <div class="progress">
                                        <div class="bar progress-bar-striped-custom" data-value="25000" max-value="50000">
                                            <div class="pct">
                                                50%
                                            </div>
                                        </div>
                                    </div>
                                    <p>Rs. 50,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="project-item">
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/hatbazar.png" alt="">
                            </div>
                            <div class="text-content">
                                <div class="title">
                                    <h5>Id enim, turpis eu.</h5>
                                </div>
                                <div class="author">
                                    <h5>Jaydon Levin</h5>
                                </div>
                                <div class="description">
                                    <p>Euismod amet, quam cras a condimentum maecenas
                                        vestibulum, imperdiet pulvinar. Proin proin cras
                                        quis consequat. Vitae, laoreet commodo  </p>
                                </div>
                                <div class="progress-bar-wrapper common-progress-bar">

                                    <div class="progress">
                                        <div class="bar progress-bar-striped-custom" data-value="40000" max-value="50000">
                                            <div class="pct">
                                                50%
                                            </div>
                                        </div>
                                    </div>
                                    <p>Rs. 50,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="project-item">
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/granny.png" alt="">
                            </div>
                            <div class="text-content">
                                <div class="title">
                                    <h5>Id enim, turpis eu.</h5>
                                </div>
                                <div class="author">
                                    <h5>Jaydon Levin</h5>
                                </div>
                                <div class="description">
                                    <p>Euismod amet, quam cras a condimentum maecenas
                                        vestibulum, imperdiet pulvinar. Proin proin cras
                                        quis consequat. Vitae, laoreet commodo  </p>
                                </div>
                                <div class="progress-bar-wrapper common-progress-bar">
                                    <div class="progress">
                                        <div class="bar progress-bar-striped-custom" data-value="25000" max-value="50000">
                                            <div class="pct" id="pct">
                                                50%
                                            </div>
                                        </div>
                                    </div>
                                    <p>Rs. 50,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="funding-section">
            <div class="custom-container">
                <div class="funding-container center-align">
                    <div class="text">
                        <h3>Do you need funding?</h3>
                    </div>
                    <div class="action">
                        <a href="#" class="covid-btn btn-red">Request Funding</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection


