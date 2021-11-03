@extends('frontend.layouts.main')
@section('content')
    <div id="home-page">
        <section class="banner-section">
            <div class="custom-container">

                <div class="common-flex banner-container">
                    <div class="text-content item">
                        <div class="section-title">
                            <h1>Massa est sit etiam diam sodales.</h1>
                        </div>
                        <div class="description">
                            <p>In scelerisque tempus viverra mollis ullamcorper quis. Tristique praesent ante volutpat, ac dolor massa ac a. Vestibulum, nibh leo.</p>
                        </div>
                        <div class="action">
                            <a href="" class="covid-btn btn-red">Request</a>
                        </div>

                    </div>
                    <div class="item banner-slider">
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png">
                        </div>
                        <div class="slider-item">
                            <img src="{{asset('client_assets')}}/img/cook.png">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="ongoing-projects-section">
            <div class="custom-container">
                <div class="projects-container common-projects">
                    <div class="text-content">
                        <div class="section-title">
                            <h1>Top Funraisers</h1>
                        </div>
{{--                        <div class="description">--}}
{{--                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat.--}}
{{--                                Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien--}}
{{--                                condimentum cras.</p>--}}
{{--                        </div>--}}
                    </div>
                    <div class="project-item-wrapper">
                        @foreach($top as $key => $campaign)
                            @if($key <= 6)
                                <div class="project-item">
                                    <a href="{{route('frontend.campaign.detail', $campaign->slug)}}">
                                        <div class="img-container">
                                            <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}" alt="">
                                        </div>
                                        <div class="text-content">
                                            <div class="title">
                                                <h5>{{$campaign->campaign_name}}</h5>
                                            </div>
                                            <div class="author">
                                                <h5>For {{$campaign->created_for}}</h5>
                                            </div>
{{--                                            <div class="description">--}}
{{--                                                <p>{{str_limit($campaign->body, 30)}}</p>--}}
{{--                                            </div>--}}
                                            <div class="progress-bar-wrapper common-progress-bar">
                                                <div class="progress">
                                                    <div class="bar progress-bar-striped-custom" data-value="{{$campaign->sum}}" max-value="{{$campaign->target_amount}}">
                                                        <div class="pct">
                                                            Rs. {{$campaign->sum}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>Rs. {{$campaign->target_amount}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="common-management-system-section">
            <div class="custom-container">
                <div class="management-container common-flex">
                    <div class="section-title">
                        <h1>The leader in online fundraising</h1>
                    </div>
                    <div class="services-wrapper">
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Worldwide leader</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Simple setup</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                        <div class="service-item">
                            <div class="inner">
                                <div class="img-container">
                                    <img src="{{asset('client_assets')}}/img/icons/02-Medical%20Result.png" alt="">
                                </div>
                                <div class="title">
                                    <p>Oxygen Availability</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="common-stories-section">
            <div class="custom-container">
                <div class="stories-slider">
                    @foreach($success_stories as $success_story)
                    <div class="story-item">
                        <div class="text-section">
                            <div class="section-title">
                                <h1>{{$success_story->title}}</h1>
                                <h3>{{$success_story->by}}</h3>
                            </div>
                            <div class="story">
                                <p>"{{$success_story->body}}"</p>
{{--                                <p>John raised $19k to help kids earn books with exercise.</p>--}}
                            </div>
                        </div>
                        <div class="img-container">
                            <img src="{{asset('uploads/campaign/thumbnail/'.$success_story->campaign->thumbnail)}}">
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="story-item">--}}
{{--                        <div class="text-section">--}}
{{--                            <div class="section-title">--}}
{{--                                <h3>FUNDRAISING STORIES</h3>--}}
{{--                                <h1>Meet Jane</h1>--}}
{{--                            </div>--}}
{{--                            <div class="story">--}}
{{--                                <p>"Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien condimentum cras."</p>--}}
{{--                                <p>John raised $19k to help kids earn books with exercise.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="img-container">--}}
{{--                            <img src="{{asset('client_assets')}}/img/streetshop.png">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="story-item">--}}
{{--                        <div class="text-section">--}}
{{--                            <div class="section-title">--}}
{{--                                <h3>FUNDRAISING STORIES</h3>--}}
{{--                                <h1>Meet John</h1>--}}
{{--                            </div>--}}
{{--                            <div class="story">--}}
{{--                                <p>"Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat. Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien condimentum cras."</p>--}}
{{--                                <p>John raised $19k to help kids earn books with exercise.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="img-container">--}}
{{--                            <img src="{{asset('client_assets')}}/img/streetshop.png">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
        <section class="ongoing-projects-section">
            <div class="custom-container">
                <div class="projects-container common-projects">
                    <div class="text-content">
                        <div class="section-title">
                            <h1>Recent Projects</h1>
                        </div>
{{--                        <div class="description">--}}
{{--                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat.--}}
{{--                                Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien--}}
{{--                                condimentum cras.</p>--}}
{{--                        </div>--}}
                    </div>
                    <div class="project-item-wrapper">
                        @foreach($campaigns as $campaign)
                                <div class="project-item">
                                    <a href="">
                                        <div class="img-container">
                                            <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}" alt="">
                                        </div>
                                        <div class="text-content">
                                            <div class="title">
                                                <h5>{{$campaign->campaign_name}}</h5>
                                            </div>
                                            <div class="author">
                                                <h5>For {{$campaign->created_for}}</h5>
                                            </div>
                                            <div class="progress-bar-wrapper common-progress-bar">
                                                <div class="progress">
                                                    <div class="bar progress-bar-striped-custom" data-value="{{$campaign->donations->sum('amount')}}" max-value="{{$campaign->target_amount}}">
                                                        <div class="pct">
                                                            Rs. {{$campaign->donations->sum('amount')}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>Rs. {{$campaign->target_amount}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="common-funding-section">
            <div class="custom-container">
                <div class="funding-container center-align">
                    <div class="text">
                        <h3>Do you need funding?</h3>
                    </div>
                    <div class="action">
                        <a href="" class="covid-btn btn-red">Request Funding</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


