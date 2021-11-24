@extends('frontend.layouts.main')
@section('content')
    <div id="request-page" class="color-bg">
        <div class="form-wrapper">
            @include('frontend.includes.message')
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Make sure all fields marked with <span style="color: red">* </span>is filled!
                    <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <h4 aria-hidden="true">&times;</h4>
                    </a>
                </div>
            @endif
            <form id="msform" action="{{route('frontend.campaign.create')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <fieldset>
                    <div class="form-content">
                        <div class="section-title">
                            <h3>Lets start with the basics</h3>
                        </div>
                        <div class="information">
                            <div class="item">
                                <label for="">Where do you live?</label>
                                <select name="country" id="country">
                                    @foreach($countries as $country)
                                        @if(!old('country'))
                                            @if($country->id == 153)
                                                <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                            @else
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endif
                                        @else
                                            @if($country->id == old('country'))
                                                <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                            @else
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="search">
                                <span><img src="{{asset('client_assets')}}/images/search.png" ></span><span style="color:red">*</span>
{{--                                <input type="text" placeholder="City Name">--}}
                                <select class="form-control" name="location_id" id="location_id"  style="width: 100%">
{{--                                    <option value="" disabled selected>-- Select City --</option>--}}
                                </select>
                            </div>
                            <div class="item">
                                <label for="">What are you fundraising for?</label>
                                <select name="category_id" id="category_id">
                                    @if(!old('category_id'))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach($categories as $category)
                                            @if($category->id == old('category_id'))
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" class="common-btn next covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="form-content">
                        <div class="section-title">
                            <h3>Set your fundraising goal <span style="color:red">*</span></h3>
                        </div>
                        <div class="information">
                            <div class="amount">
                                <span>Rs.</span>
                                <input type="number" id="target_amount" name="target_amount" value="{{old('target_amount')}}">
                            </div>
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <input type="button" name="next" class="next action-button common-btn covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="section-title">
                        <h3>Add a Thumbnail <span style="color:red">*</span></h3>
                    </div>
                    <div class="information">
                        <div class="img-container">
                            <input id="thumbnail" type="file" name="thumbnail" onchange="PreviewThumbnail();" />
                            <img id="thumbnailPreview" style="width: 100px; height: 100px;" />
                        </div>
                    </div>

                    <div class="section-title">
                        <h3>Add a Logo if Organization</h3>
                    </div>
                    <div class="information">
                        <div class="img-container">
                            <input id="logo" type="file" name="logo" onchange="PreviewLogo();" />
                            <img id="logoPreview" style="width: 100px; height: 100px;" />
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <input type="button" name="next" class="next action-button common-btn covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="form-content">
                        <div class="section-title">
                            <h3>Tell your story</h3>
                        </div>
                        <div class="information">
                            <div class="item">
                                <label for="">What is your fundraiser title?  <span style="color:red">*</span></label>
                                <input type="text" id="campaign_name" name="campaign_name" placeholder="Enter Title" value="{{old('campaign_name')}}">
                            </div>
                            <div class="item">
                                <label for="">Why are you fundraising? <span style="color:red">*</span></label>
                                <textarea name="body" id="body" cols="30" rows="10">{!! old('body') !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <input type="button" name="next" class="next action-button common-btn covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="form-content last">
                        <div class="section-title">
                            <h3>Your almost there</h3>
                        </div>
                        <div class="information">
                            <label for="">Who is this fundraiser for? <span style="color:red">*</span></label>
                            <input type="text" id="created_for" name="created_for" value="{{old('created_for')}}">
                            <label for="">Stop Fundraiser</label>
                            <select name="stop_limit" id="stop_limit">
                                @if(old('stop_limit') == 0)
                                    <option value="0" selected>At Target Amount</option>
                                    <option value="1">Allow Unlimited Donations</option>
                                @else
                                    <option value="0">At Target Amount</option>
                                    <option value="1" selected>Allow Unlimited Donations</option>
                                @endif
                            </select>
{{--                            <label for="">Province</label>--}}
{{--                            <input type="text">--}}
{{--                            <label for="">Country</label>--}}
{{--                            <input type="text">--}}
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <button type="submit" class="action-button common-btn covid-btn btn-red">Next</button>
                </fieldset>
{{--                <fieldset>--}}
{{--                    <div class="form-card">--}}
{{--                        <h2 class="fs-title text-center">Thank You</h2> <br>--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#location_id").select2({
                placeholder: "Select Your City",
                minimumInputLength: 2,
                ajax: {
                    url: '{{route('frontend.campaign.location')}}',
                    dataType: 'json',
                    type: "GET",
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term, country: $('#country').prop('selected', true).val()
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        function PreviewThumbnail() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("thumbnail").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("thumbnailPreview").src = oFREvent.target.result;
            };
        }

        function PreviewLogo() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("logo").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("logoPreview").src = oFREvent.target.result;
            };
        }
    </script>

@endsection
