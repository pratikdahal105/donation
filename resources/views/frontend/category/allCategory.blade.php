@extends('frontend.layouts.main')
@section('content')
    <div id="fundraisers-page">
        <div class="fundraisers-wrapper">
            <div class="hading-section" style="background-color: #EBECF0; padding: 1%">
                <div class="custom-container remove-padding-bottom">
                    <div class="section-title">
                        <h1>All fundraisers</h1>
                    </div>
                    <div class="btn-section">
                        <p>People around the world are raising money for what they are passionate about.</p>
                        <a href="{{route('frontend.campaign.request')}}" class="covid-btn btn-red">Request</a>
                    </div>
                </div>
            </div>
            <section class="common-management-system-section">
                <div class="custom-container">
                    <div class="management-container common-flex">
                        <div class="section-title">
                            <h1>Explore Fundraisers</h1>
                        </div>
                        <div class="services-wrapper">
                            @foreach($categories as $category)
                                <div class="service-item">
                                    <div class="inner">
                                        <a href="{{route('frontend.campaign.category',$category->slug)}}">
                                            <div class="img-container">
                                                <img src="{{asset('uploads/category/logo/'.$category->logo)}}" height="100" width="100" alt="">
                                            </div>
                                            <div class="title">
                                                <p>{{$category->name}}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <div class="fundraisers-section">
                <div class="custom-container">
                    <div class="section-title">
                        <h1>Top Fundraisers</h1>
                    </div>
                    <div class="projects-container common-projects">
                        <div class="project-item-wrapper">
                            @php($key = 0)
                            {{--                        @php(dd($top))--}}
                            @foreach($top as $value)
                                @if($key <= 12)
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
            </div>
        </div>
    </div>
@endsection
