@extends('frontend.layouts.main')
@section('content')
    <div id="fundraisers-page">
        <div class="fundraisers-wrapper">
            <section class="common-management-system-section">
                <div class="custom-container">
                    <div class="management-container common-flex">
                        @if($campaigns->first())
                            <div class="section-title">
                                <h3>Your Campaigns</h3>
                            </div>
                        @else
                            <div class="section-title">
                                <h3>No Campaigns To Show</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
        @if($campaigns->first())
            <div class="fundraisers-wrapper">
                <div class="fundraisers-section">
                    <div class="custom-container">
                        <div class="projects-container common-projects">
                            <div class="project-item-wrapper" id="appendSearch">
                                @foreach($campaigns as $campaign)
                                    <div class="project-item" id="searchCount">
                                        <a href="{{route('frontend.campaign.detail', $campaign->slug)}}">
                                            <div class="img-container">
                                                <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}" alt="">
                                            </div>
                                            <div class="text-content">
                                                <div class="title">
                                                    <h5>{{$campaign->campaign_name}}</h5>
                                                    <div class="dot-nav">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <div class="nav-content">
                                                            <p><a href="">Post Updates</a></p>
                                                            <p><a href="">Edit</a></p>
                                                            <p><a href="">Delete</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="author">
                                                    <h5>For {{$campaign->created_for}}</h5>
                                                </div>
                                                @if($campaign->status == 1)
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
                                                @else
                                                    <div class="progress-bar-wrapper common-progress-bar">
                                                        <h3 style="color:#de0d0d">Pending Approval</h3>
{{--                                                        <div class="progress">--}}

{{--                                                            <div class="bar progress-bar-striped-custom" data-value="{{$campaign->donations->sum('amount')}}" max-value="{{$campaign->target_amount}}">--}}
{{--                                                                <div class="pct">--}}
{{--                                                                    Rs. {{$campaign->donations->sum('amount')}}--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                        <p>Target: Rs. {{$campaign->target_amount}}</p>
                                                    </div>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="btn-section text-center">
                                <a id="loadMoreButton" class="covid-btn btn-red">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script>
        $('#loadMoreButton').click(function(){
            var searchCount = $("div[id*='searchCount']").length;
            $.ajax({
                url:"{{ route('frontend.user.load.more') }}",
                method:"GET",
                data:{searchCount:searchCount},
                success:function(data)
                {
                    $('#appendSearch').append(data);
                    if(data == ''){
                        $('#loadMoreButton').hide();
                    }
                    mcustomInit();
                }
            });
        });
    </script>
@endsection
