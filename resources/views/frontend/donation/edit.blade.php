@extends('frontend.layouts.main')
@section('content')

    <div id="request-page" class="color-bg">
        <div class="form-wrapper">
            @include('frontend.includes.message')
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                        <a type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <h4 aria-hidden="true">&times;</h4>
                        </a>
                    </div>
                @endforeach
            @endif
            <form id="msform" action="{{route('frontend.user.donation.edit', $donation->slug)}}" enctype="multipart/form-data" method="POST">
                @csrf
                <fieldset>
                    <div class="form-content last">
                        <div class="section-title">
                            <h3>Edit Donation</h3>
                        </div>
                        <div class="information">
                            <label for="">Remarks</label>
                            <textarea type="text" id="remarks" name="remarks" rows="5">{{$donation->remarks}}</textarea><br>
                            <label for="">Visibility</label>
                            <select name="anonymous" id="anonymous">
                                @if($donation->anonymous == 0)
                                    <option value="0" selected>Visible</option>
                                    <option value="1">Anonymous</option>
                                @else
                                    <option value="0">Visible</option>
                                    <option value="1" selected>Anonymous</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="action-button common-btn covid-btn btn-red">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
