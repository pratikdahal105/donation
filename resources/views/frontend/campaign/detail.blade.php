@extends('frontend.layouts.main')
@section('content')

    <div id="donation-page">
        <section class="details-section">
            <div class="custom-container">
                <div class="details-wrapper">
                    <div class="information-container">
                        <div class="project-item">
                            <div class="img-container">
                                <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}">
                            </div>
                            <div class="text-content">
                                <div class="title">
                                    <h2>{{$campaign->campaign_name}}</h2>
                                </div>
                                <div class="author">
                                    <h3>For {{$campaign->created_for}}</h3>
                                </div>
                                <div class="description">
                                    <p>{!! $campaign->body !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="all-donations-section" id="all">
                            <div class="section-title">
                                <h1>All Donations</h1>
                            </div>
                            <div class="donation-items-section">
                                @foreach($campaign->donations as $donation)
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            <h3>{{$donation->user->name}}</h3>
                                            <h4>Donated Rs.{{$donation->amount}}</h4>
                                        </div>
                                        <div class="comment">
                                            <p>{{$donation->remarks}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="btn-section">
                                    <a href="#" class="covid-btn btn-red">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="donate-section">
                        <div class="donation-wrapper">
                            <div class="progress-bar-wrapper common-progress-bar">
                                <h4>Rs. {{$campaign->donations->sum('amount')}} raised of Rs. {{$campaign->target_amount}} goal</h4>
                                <div class="progress">
                                    <div class="bar progress-bar-striped-custom" data-value="{{$campaign->donations->sum('amount')}}" max-value="{{$campaign->target_amount}}">
                                        <div class="pct">
                                            Rs. {{$campaign->donations->sum('amount')}}
                                        </div>
                                    </div>
                                </div>
{{--                                <h5>{{count($campaign->donations)}} {{str_plural('Donor', count($campaign->donations))}}</h5>--}}
                            </div>
                            <div class="btn-section">
                                <a href="#" class="covid-btn btn-red">Share</a>
                                <a href="#" class="covid-btn btn-red">Donate Now</a>
                            </div>
                            <div class="donation-text">
                                <h5><span><img src="{{asset('client_assets')}}/img/icons/tick.png"></span> {{count($campaign->donations)}} {{str_plural('person', count($campaign->donations))}} just donated</h5>
                                <div class="top-donation">
                                    <div class="title">
                                        <h4>Top Donation</h4>
                                    </div>
                                    <div class="inner">
                                        <div class="img-container">
                                            <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                        </div>
                                        <div class="text">
                                            <h5>{{$campaign->donations->where('amount', $campaign->donations->max('amount'))->first()->user->name}}:</h5>
                                            <p> Rs. {{$campaign->donations->max('amount')}}</p>
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
