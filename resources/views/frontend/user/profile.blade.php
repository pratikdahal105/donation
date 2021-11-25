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
            <form id="msform" action="{{route('frontend.user.profile')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <fieldset>
                    <div class="form-content last">
                        <div class="section-title">
                            <h3>Profile</h3>
                        </div>
                        <div class="information">
                            <label for="">Full Name</label>
                            <input type="text" id="name" name="name" value="{{$user->name}}">
                            <label for="">Email</label>
                            <input type="email" id="email" name="email" value="{{$user->email}}">
                            <label for="">Contact</label>
                            <input type="tel" id="contact" name="contact" value="{{$user->contact}}">

                        </div>
                    </div>
                    <button type="submit" class="action-button common-btn covid-btn btn-red">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>

@endsection
