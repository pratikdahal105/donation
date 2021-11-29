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
            @if($edit)
                <form id="msform" action="{{route('frontend.user.campaign.update.edit', $update->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-content last">
                            <div class="section-title">
                                <h3>Campaign Updates for {{$update->campaign->campaign_name}}</h3>
                            </div>
                            <div class="information">
                                <label for="">Updates</label>
                                <textarea type="text" id="body" name="body">{!! $update->body !!}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="action-button common-btn covid-btn btn-red">Update</button>
                        <a href="{{route('frontend.user.campaign.update.delete', $update->id)}}" class="action-button common-btn covid-btn btn-red"><i class="fa fa-trash"></i></a>
                    </fieldset>
                </form>
            @else
                <form id="msform" action="{{route('frontend.user.campaign.update', $campaign->slug)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-content last">
                            <div class="section-title">
                                <h3>Campaign Updates for {{$campaign->campaign_name}}</h3>
                            </div>
                            <div class="information">
                                <label for="">Updates</label>
                                <textarea type="text" id="body" name="body">{!! old('body') !!}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="action-button common-btn covid-btn btn-red">Submit</button>
                    </fieldset>
                </form>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#body').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']]
                ]
            });
        });
    </script>
@endsection
