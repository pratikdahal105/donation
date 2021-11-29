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
                            <div class="all-donations-section">
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
                            @if($campaign->campaign_updates->first())
                                <div class="all-donations-section">
                                    <div class="section-title">
                                        <h2>Campaign Updates</h2>
                                    </div>
                                    @foreach($campaign->campaign_updates as $update)
                                    <div class="donation-items-section">
                                        <div class="donation-item">
                                            <div class="text">
                                                <div class="amount">
                                                    <p>{!! $update->body !!}</p><br>
                                                    <b>{{$update->created_at->diffForHumans()}}</b><br>
                                                    @if($campaign->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                                                        <a href="{{route('frontend.user.campaign.update.edit', $update->id)}}" class="covid-btn btn-red">Edit</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @if($campaign->donations->first())
                        <div class="all-donations-section" id="all">
                            <div class="section-title">
                                <h1>All Donations</h1>
                            </div>
                            <div class="donation-items-section" id="donationAppend">
                                @foreach($campaign->donations->sortByDesc('created_at')->take(6) as $donation)
                                <div class="donation-item" id="countDonation">
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
                            </div>
                            <div class="btn-section">
                                <a id="loadMoreButton" class="covid-btn btn-red">Load More</a>
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
                                <a
                                    @if($campaign->status == 1)
                                        href="{{route('frontend.donation.form', $campaign->slug)}}"
                                    @endif
                                    class="covid-btn btn-red">Donate Now</a>
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
                                        <a data-scroll="all" href="#all" class="covid-btn btn-red">See all donations</a>
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
    <script>
        $('#loadMoreButton').click(function(){
            var countDonation = $("div[id*='countDonation']").length;
            var campaign_id = {{$campaign->id}};
            $.ajax({
                url:"{{ route('frontend.donation.more') }}",
                method:"GET",
                data:{countDonation:countDonation, campaign_id:campaign_id},
                dataType: 'html',
                success:function(data)
                {
                    $('#donationAppend').append(data);
                    if(data == ''){
                        $('#loadMoreButton').hide();
                    }
                    mcustomInit();
                }
            });
        });
    </script>
@endsection
