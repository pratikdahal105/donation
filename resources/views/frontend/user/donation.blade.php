@extends('frontend.layouts.main')
@section('content')
    <div id="donation-page">
        <section class="details-section">
            <div class="custom-container">
                @if($donations->first())
                    <div class="details-wrapper">
                        <div class="information-container">
                            <div class="all-donations-section" id="all">
                                @include('frontend.includes.message')
                                    <div class="section-title">
                                        <h2>Your Donations</h2>
                                    </div>
                                    <div class="donation-items-section" id="donationAppend">
                                        @foreach($donations as $donation)
                                            <div class="donation-item" id="countDonation">
                                                <div class="img-container">
                                                    <img src="{{asset('client_assets')}}/img/menu-icon/09-Doctor.png">
                                                </div>
                                                <div class="text">
                                                    <div class="amount">
                                                        @if($donation->anonymous != 1)
                                                            <h3>{{$donation->user->name}}</h3>
                                                        @else
                                                            <h3>Anonymous</h3>
                                                        @endif
                                                            <h4>Donated Rs.{{$donation->amount}}  (For <a href="{{route('frontend.campaign.detail', $donation->campaign->slug)}}" style="color: #c40000">{{$donation->campaign->campaign_name}}</a>)</h4>
                                                    </div>
                                                    <div class="comment">
                                                        <p>{{$donation->remarks}}</p>
                                                    </div>
                                                    <p>({{$donation->created_at->diffForHumans()}})</p><br>
                                                    <a type="button" class="covid-btn btn-red" href="{{route('frontend.user.donation.edit', $donation->slug)}}">Edit</a>
                                                    <span><b>Reference No: {{$donation->reference_no}}</b></span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="btn-section">
                                        <a id="loadMoreButton" class="covid-btn btn-red">Load More</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="section-title">
                        <section class="common-funding-section">
                            <div class="custom-container">
                                <div class="funding-container center-align">
                                    <h3>No Donations To Show</h3><br><br>
                                    <div class="text">
                                        <h3>Explore Fundraising Campaigns</h3>
                                    </div>
                                    <div class="action">
                                        <a href="{{route('frontend.all.discover')}}" class="covid-btn btn-red">Explore</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                @endif
            </div>
        </section>
    </div>

    <script>
        $('#loadMoreButton').click(function(){
            var countDonation = $("div[id*='countDonation']").length;
            $.ajax({
                url:"{{ route('frontend.user.donation.more') }}",
                method:"GET",
                data:{countDonation:countDonation},
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
