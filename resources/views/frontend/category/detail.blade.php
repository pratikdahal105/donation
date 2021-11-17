@extends('frontend.layouts.main')
@section('content')

    <div id="memorial-page" class="common-page">
        <section class="banner-section">
            <div class="custom-container">
                <div class="banner-wrapper">
                    <div class="banner-text">
                        <div class="section-title">
                            <h1>Get help with {{$category_first->name}} fundraising</h1>
                        </div>
{{--                        <div class="description">--}}
{{--                            <h5>With us, you can get immediate help with medical bills.</h5>--}}
{{--                        </div>--}}
                        <div class="btn-section">
                            <a href="{{route('frontend.campaign.request')}}" class="covid-btn btn-red">Request</a>
                        </div>
                    </div>
                    <div class="img-container">
                        <img src="{{asset('uploads/category/thumbnail/'.$category_first->thumbnail)}}">
                    </div>
                </div>
            </div>
        </section>
        @if($top->first())
        <section class="ongoing-projects-section">
            <div class="custom-container">
                <div class="projects-container common-projects">
                    <div class="text-content">
                        <div class="section-title">
                            <h1>Trending in {{$category_first->name}} fundraising</h1>
                        </div>
                    </div>
                    <div class="project-item-wrapper">
                        @php($key = 0)
{{--                        @php(dd($top))--}}
                        @foreach($top as $value)
                            @if($key <= 6)
                                @if($value->sum < $value->target_amount)
                                    <div class="project-item">
                                        <a href="{{route('frontend.campaign.detail', $value->slug)}}">
                                            <div class="img-container">
                                                <img src="{{asset('uploads/campaign/thumbnail/'.$value->thumbnail)}}" alt="">
                                            </div>
                                            <div class="text-content">
                                                <div class="title">
                                                    <h5>{{$value->campaign_name}}</h5>
                                                </div>
                                                <div class="author">
                                                    <h5>For {{$value->created_for}}</h5>
                                                </div>
                                                <div class="progress-bar-wrapper common-progress-bar">
                                                    <div class="progress">
                                                        <div class="bar progress-bar-striped-custom" data-value="{{$value->sum}}" max-value="{{$value->target_amount}}">
                                                            <div class="pct">
                                                                Rs. {{$value->sum}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Rs. {{$value->target_amount}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @php($key = $key + 1)
                                @else
                                    @continue
                                @endif
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <section class="fund-information-section">
            <div class="custom-container">
                <div class="section-title">
                    <h1>In online {{$category_first->name}} fundraising</h1>
                </div>
                <div class="fund-information">
                    <div class="info-item">
                        <h4>{{count($category_first->campaigns)-1}}+</h4>
                        <p>{{$category_first->name}} fundraisers</p>
                    </div>
                    <div class="info-item">
                        <h4>Rs. {{$campaign_sum - 10}}+</h4>
                        <p>raised</p>
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
                        <a href="{{route('frontend.campaign.request')}}" class="covid-btn btn-red">Request Funding</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="memorial-projects-section">
            <div class="custom-container">
                <div class="projects-container common-projects">
                    <div class="text-content">
                        <div class="section-title">
                            <h1>Campaigns in {{$category_first->name}} fundraising</h1>
                        </div>
{{--                        <div class="description">--}}
{{--                            <p>Euismod amet, quam cras a condimentum maecenas vestibulum, imperdiet pulvinar. Proin proin cras quis consequat.--}}
{{--                                Vitae, laoreet commodo tellus nunc facilisis tincidunt nisl, quam sagittis. Laoreet iaculis posuere id sapien--}}
{{--                                condimentum cras.</p>--}}
{{--                        </div>--}}
                    </div>
                    <div class="project-item-wrapper">
                        @foreach($category_first->campaigns as $key => $campaign)
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
                        @else
                                @break
                        @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
