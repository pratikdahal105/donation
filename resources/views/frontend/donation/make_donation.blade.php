@extends('frontend.layouts.main')
@section('content')

<div id="donation-inner-page" onload="calculate()">
    <div class="custom-container">
        <div class="donation-wrapper">
            <div class="donate-info-section">
                @include('frontend.includes.message')
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Make sure all fields marked with <span style="color: red">* </span>is filled!
                        <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <h4 aria-hidden="true">&times;</h4>
                        </a>
                    </div>
                @endif
                <div class="donation-info">
                    <div class="img-container">
                        <img src="{{asset('uploads/campaign/thumbnail/'.$campaign->thumbnail)}}" alt="">
                    </div>
                    <div class="info">
                        <p>You're supporting</p>
                        <h2>{{$campaign->campaign_name}}</h2>
                    </div>
                </div>
                <form  action="{{route('frontend.donation.request')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="donation-amount">
                        <h3>Enter your donation amount <span style="color: red">*</span></h3>
                        <div class="donation">
                            <span>Rs.</span>
                            <input id="amount" type="number" name="amount" value="{{ old('amount') }}">
                        </div>
                    </div>
                    <div class="">
                        <h3>Message</h3>
                        <div class="donation">
                            <textarea id="remarks" type="text" name="remarks" class="col-md-6" rows="5">{{ old('remarks') }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="actual_amount" id="actual_amount" value="">
                    <div class="tip-section">
                        <h3>You can tip here</h3>
                        @if(old('slider'))
                            <input type="range" min="{{$campaign->minimum_tip}}" max="30" value="{{old('slider')}}" name="slider" class="slider" id="myRange">
                        @else
                            <input type="range" min="{{$campaign->minimum_tip}}" max="30" value="15" name="slider" class="slider" id="myRange">
                        @endif
                        <p>Tip: <span id="demo"></span>%</p>
    {{--                    <div class="btn-section">--}}
    {{--                        <a href="" class="covid-btn btn-red">Continue</a>--}}
    {{--                    </div>--}}
                    </div>
                    <div class="optional-section">
                        <input type="checkbox" name="anonymous" id="anonymous">
                        <label for="">Don't display my name publicly on the campaign.</label>
                        <input type="checkbox" name="notification" id="notification" checked>
                        <label for="">Get occasional marketing updates from GoFundMe. You may unsubscribe at any time.</label>
                    </div>
                    <div class="btn-section">
                        <button type="submit" class="covid-btn btn-red">Continue</button>
                    </div>
                </form>
            </div>
            <div class="donation-summary">
                <div class="section-title">
                    <h2>Your Donation</h2>
                </div>
                <div class="table-section">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Your donation</td>
                            <td id="amount_dis"></td>
                        </tr>
                        <tr>
                            <td>Tip</td>
                            <td id="myRange_dis"></td>
                        </tr>
                        <tr>
                            <td>Total due today</td>
                            <td id="actual_amount_dis"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        window.addEventListener("load", function(){
            return calculate()
        });
        var amount = document.getElementById('amount')
        var tip = document.getElementById('myRange')
        var actual = document.getElementById('actual_amount')
        var disAmount = document.getElementById('amount_dis')
        var disRange = document.getElementById('myRange_dis')
        var disActual = document.getElementById('actual_amount_dis')
        var append_to = "Rs. "
        function calculate() {
            if(amount.value > 6){
                amount.value = amount.value.substr(0, 6);
            }
            var tipAmount = (tip.value/100)*amount.value;
            var actual_total = parseInt(amount.value) + tipAmount;
            if(isNaN(actual_total)){
                actual.value = null;
                disAmount.innerHTML = append_to.concat(0);
                disRange.innerHTML = append_to.concat(0);
                disActual.innerHTML = append_to.concat(0);
            }
            else{
                actual.value = Math.round(actual_total * 10) / 10;
                disAmount.innerHTML = append_to.concat(amount.value);
                disRange.innerHTML = append_to.concat(Math.round(tipAmount * 10) / 10);
                disActual.innerHTML = append_to.concat(Math.round(actual_total * 10) / 10);
            }
        }
        amount.addEventListener('input', calculate);
        tip.addEventListener('input', calculate);

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>

@endsection
