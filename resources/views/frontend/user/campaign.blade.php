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
            var key = "{{$key}}";
            $.ajax({
                url:"{{ route('frontend.search.more') }}",
                method:"GET",
                data:{searchCount:searchCount, key:key},
                success:function(data)
                {
                    $('#appendSearch').append(data);
                    if(data == ''){
                        $('#loadMoreButton').hide();
                    }
                }
            });
        });
    </script>
@endsection
