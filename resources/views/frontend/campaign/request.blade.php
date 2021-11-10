@extends('frontend.layouts.main')
@section('content')
    <style>
        .container {
            width: auto;
            max-width: 680px;
            padding: 0 15px;
        }

        .progress {
            margin-bottom:0;
            margin-top:6px;
            margin-left:10px;
        }

        .btn.focus {
            outline:thin dotted #333;
            outline:5px auto -webkit-focus-ring-color;
            outline-offset:-2px;
        }

        .btn.hover {
            color:#ffffff;
            background-color:#3276b1;
            border-color:#285e8e;
        }
    </style>
    <div id="request-page" class="color-bg">
        <div class="form-wrapper">
            <form id="msform" action="" enctype="multipart/form-data" method="POST">
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
                                        @if($country->id == 153)
                                            <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="search">
                                <span><img src="{{asset('client_assets')}}/images/search.png" ></span>
{{--                                <input type="text" placeholder="City Name">--}}
                                <select class="form-control" name="city_id" id="city_id"  style="width: 100%" required>
{{--                                    <option value="" disabled selected>-- Select City --</option>--}}
                                </select>
                            </div>
                            <div class="item">
                                <label for="">What are you fundraising for?</label>
                                <select name="category" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" class="common-btn next covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="form-content">
                        <div class="section-title">
                            <h3>Set your fundraising goal</h3>
                        </div>
                        <div class="information">
                            <div class="amount">
                                <span>Rs.</span>
                                <input type="number" id="amount" name="amount">
                            </div>
                        </div>
                    </div>

                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <input type="button" name="next" class="next action-button common-btn covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="section-title">
                        <h3>Add a Photo or Video</h3>
                    </div>
                    <div class="container">
{{--                        <div class="page-header">--}}
{{--                            <h1>Simple Ajax Uploader</h1>--}}
{{--                            <h3>Basic Example</h3>--}}
{{--                        </div>--}}
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-2">
                                <button id="uploadBtn" class="btn btn-large btn-primary">Choose File</button>
                            </div>
                            <div class="col-xs-10">
                                <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                                    <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-10">
                                <div id="msgBox">
                                </div>
                            </div>
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
                                <label for="">What is your fundraiser title?</label>
                                <input type="text" placeholder="Enter Title">
                            </div>
                            <div class="item">
                                <label for="">Why are you fundraising?</label>
                                <textarea name="" id="" cols="30" rows="10"></textarea>
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
                            <input type="text" placeholder="Mailing address">
                            <label for="">Postcode</label>
                            <input type="text">
                            <label for="">City</label>
                            <input type="text">
                            <label for="">Province</label>
                            <input type="text">
                            <label for="">Country</label>
                            <input type="text">
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous common-btn covid-btn btn-red" value="Back" />
                    <input type="button" name="next" class="next action-button common-btn covid-btn btn-red" value="Next" />
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <h2 class="fs-title text-center">Thank You</h2> <br>
                        <div class="row justify-content-center">
                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#city_id").select2({
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

        function escapeTags( str ) {
            return String( str )
                .replace( /&/g, '&amp;' )
                .replace( /"/g, '&quot;' )
                .replace( /'/g, '&#39;' )
                .replace( /</g, '&lt;' )
                .replace( />/g, '&gt;' );
        }

        window.onload = function() {

            var btn = document.getElementById('uploadBtn'),
                progressBar = document.getElementById('progressBar'),
                progressOuter = document.getElementById('progressOuter'),
                msgBox = document.getElementById('msgBox');

            var uploader = new ss.SimpleUpload({
                button: btn,
                url: 'file_upload.php',
                name: 'uploadfile',
                multipart: true,
                hoverClass: 'hover',
                focusClass: 'focus',
                responseType: 'json',
                startXHR: function() {
                    progressOuter.style.display = 'block'; // make progress bar visible
                    this.setProgressBar( progressBar );
                },
                onSubmit: function() {
                    msgBox.innerHTML = ''; // empty the message box
                    btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
                },
                onComplete: function( filename, response ) {
                    btn.innerHTML = 'Choose Another File';
                    progressOuter.style.display = 'none'; // hide progress bar when upload is completed

                    if ( !response ) {
                        msgBox.innerHTML = 'Unable to upload file';
                        return;
                    }

                    if ( response.success === true ) {
                        msgBox.innerHTML = '<strong>' + escapeTags( filename ) + '</strong>' + ' successfully uploaded.';

                    } else {
                        if ( response.msg )  {
                            msgBox.innerHTML = escapeTags( response.msg );

                        } else {
                            msgBox.innerHTML = 'An error occurred and the upload failed.';
                        }
                    }
                },
                onError: function() {
                    progressOuter.style.display = 'none';
                    msgBox.innerHTML = 'Unable to upload file';
                }
            });
        };

    </script>

@endsection
