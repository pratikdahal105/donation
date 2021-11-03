@extends('frontend.layouts.main')
@section('content')

    <div id="donation-page">
        <section class="details-section">
            <div class="custom-container">
                <div class="details-wrapper">
                    <div class="information-container">
                        <div class="project-item">
                            <div class="img-container">
                                <img src="{{asset('client_assets')}}/img/streetshop.png">
                            </div>
                            <div class="text-content">
                                <div class="title">
                                    <h3>Id enim, turpis eu.</h3>
                                </div>
                                <div class="author">
                                    <h2>Jaydon Levin</h2>
                                </div>
                                <div class="description">
                                    <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="all-donations-section" id="all">
                            <div class="section-title">
                                <h1>All Donations</h1>
                            </div>
                            <div class="donation-items-section">
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>Jane Doe</h3>
                                            <h4>Donated Rs.70,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>John Doe</h3>
                                            <h4>Donated Rs.80,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>Jane Doe</h3>
                                            <h4>Donated Rs.33,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>John Doe</h3>
                                            <h4>Donated Rs.80,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>Jane Doe</h3>
                                            <h4>Donated Rs.80,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>John Doe</h3>
                                            <h4>Donated Rs.40,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>Jane Doe</h3>
                                            <h4>Donated Rs.80,000</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>John Doe</h3>
                                            <h4>Donated Rs.60,850</h4>
                                        </div>
                                        <div class="comment">
                                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-section">
                                    <a href="#" class="covid-btn btn-red">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="donate-section">
                        <div class="donation-wrapper">
                            <div class="progress-bar-wrapper common-progress-bar">
                                <h4>Rs. 50,000 raised of Rs. 100,000goal</h4>
                                <div class="progress">
                                    <div class="bar progress-bar-striped-custom" data-value="25000" max-value="50000">
                                        <div class="pct">
                                            50%
                                        </div>
                                    </div>
                                </div>
                                <h5>20.3k Donors</h5>
                            </div>
                            <div class="btn-section">
                                <a href="#" class="covid-btn btn-red">Share</a>
                                <a href="#" class="covid-btn btn-red">Donate Now</a>
                            </div>
                            <div class="donation-text">
                                <h5><span><img src="{{asset('client_assets')}}/img/icons/tick.png"></span> 20,264 people just donated</h5>
                                <div class="top-donation">
                                    <div class="title">
                                        <h4>Top Donation</h4>
                                    </div>
                                    <div class="inner">
                                        <div class="img-container">
                                            <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                        </div>
                                        <div class="text">
                                            <h5>John Doe:</h5>
                                            <p>Rs.504000</p>
                                        </div>
                                    </div>
                                    <div class="btn-section">
                                        <a href="#all" data-scroll="all" class="covid-btn btn-red">See all donations</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
