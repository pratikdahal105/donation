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
                                    <b> ({{$campaign->created_at->diffForHumans()}}) </b>
                                </div>
                                <div class="description">
                                    <p>{!! $campaign->body !!}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="all-donations-section" id="all">
                                <div class="section-title">
                                    <h2>Organized By</h2>
                                </div>
                                <div class="donation-items-section">
                                    <div class="donation-item">
                                        <div class="text">
                                            <div class="amount">
                                                <h3>{{$campaign->user->name}}</h3><br>
                                                <button class="btn btn-success btn-sm">Contact</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($campaign->donations->first())
                        <div class="all-donations-section" id="all">
                            <div class="section-title">
                                <h1>All Donations</h1>
                            </div>
                            <div class="donation-items-section">
                                @foreach($campaign->donations->sortByDesc('created_at') as $donation)
                                <div class="donation-item">
                                    <div class="img-container">
                                        <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                    </div>
                                    <div class="text">
                                        <div class="amount">
                                            @if($donation->anonymous != 1)
                                                <h3>{{$donation->user->name}}</h3>
                                                <h4>Donated Rs.{{$donation->amount}}</h4>
                                            @else
                                                <h3>Anonymous</h3>
                                                <h4>Donated Rs.{{$donation->amount}}</h4>
                                            @endif
                                        </div>
                                        <div class="comment">
                                            <p>{{$donation->remarks}}</p>
                                        </div>
                                        <p>({{$donation->created_at->diffForHumans()}})</p>
                                    </div>
                                </div>
                                @endforeach
                                <div class="btn-section">
                                    <a href="#" class="covid-btn btn-red">Load More</a>
                                </div>
                            </div>
                        </div>
                        @endif
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
                                @if(!($campaign->donations->sum('amount')>$campaign->target_amount && $campaign->stop_limit == 0))
                                <a href="{{route('paywithpaypal')}}" class="covid-btn btn-red">Donate Now</a>
                                @endif
                            </div>
                            @if($campaign->donations->first())
                            <div class="donation-text">
                                <h5><span><img src="{{asset('client_assets')}}/img/icons/tick.png"></span> {{count($campaign->donations)}} {{str_plural('person', count($campaign->donations))}} just donated</h5>
                                <br><p>Last Donation {{$campaign->donations->sortByDesc('created_at')->first()->created_at->diffForHumans()}}</p>
                                <div class="top-donation">
                                    <div class="title">
                                        <h4>Top Donation</h4>
                                    </div>
                                    <div class="inner">
                                        <div class="img-container">
                                            <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                        </div>
                                        <div class="text">
                                            <h5>{{$campaign->donations->where('amount', $campaign->donations->max('amount'))->where('anonymous', 0)->first()->user->name ?? 'Anonymous'}}:</h5>
                                            <p> Rs. {{$campaign->donations->max('amount')}}</p>
                                        </div>
                                    </div>
                                    <div class="btn-section">
                                        <a href="#all" data-scroll="all" class="covid-btn btn-red">See all donations</a>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="donation-text text-center">
                                    <h3>Become the first donor</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
