<body>

<!------------------------------------- Wrapper Starts ------------------------------------->
<div id="wrapper">

    <!--------------------------------- Header Wrapper Starts ---------------------------------->
    <header id="header-wrapper">
        <header id="header-wrapper">
            <div class="custom-container">
                <div class="header-container">
                    <div class="menu-items">
                        <ul>
                            <li><a href="">Discover <span><img src="{{asset('client_assets')}}/images/dropdown.png"></span></a>
                                <ul>
                                    <li><a href="{{route('frontend.all.discover')}}">Fundraisers</a></li>
                                </ul>
                            </li>
                            <li><a href="">Fundraiser for <span><img src="{{asset('client_assets')}}/images/dropdown.png"></span></a>
                                <ul>
                                    @foreach($categories as $key => $category)
                                        @if($key < 5)
                                            <li><a href="{{route('frontend.campaign.category',$category->slug)}}">{{$category->name}}</a></li>
                                        @else
                                            @break
                                        @endif
                                    @endforeach
                                        <li><a href="{{route('frontend.all.category')}}">See All</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="search-btn" href="#"><span><img src="{{asset('client_assets')}}/images/search.png" > Search</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-container">
                        <a href="{{route('frontend.home')}}">
                            <img src="{{asset('client_assets')}}/img/logo/agni-logo.png" alt="site-logo">
                        </a>
                    </div>
                    <div class="login-request">
                        @guest
                            <div class="login">
                                <a href="{{route('login')}}">
                                    <img src="{{asset('client_assets')}}/img/icons/user.png" alt="">
                                    <span> Login</span>
                                </a>
                            </div>
                        @endguest
                        @auth
                                <div class="login">
                                    <a href="#">
                                        <img src="{{asset('client_assets')}}/img/icons/user.png" alt="">
                                        <span> {{Auth::user()->name}}</span>
                                    </a>
                                    <div class="login-dropdown">
                                        <div class="img-container">
                                            <img src="{{asset('client_assets')}}/img/icons/round-account.png" alt="">
                                            <h5>{{Auth::user()->name}}</h5>
                                        </div>
                                        <div class="options-section">
                                            <p><a href="{{route('frontend.user.profile')}}">Manage my account</a></p>
                                            <p><a href="{{route('frontend.user.password')}}">Change Password</a></p>
                                            <p><a href="">My Donation</a></p>
                                            <p><a href="{{route('frontend.user.campaign')}}">My Fundraiser</a></p>
                                            <p><a href="#" onclick="submitLogoutForm()">Logout</a></p>
                                            <form action="{{route('logout')}}" id="logout_form" method="POST">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        @endauth
                        <div class="request">
                            <a href="{{route('frontend.campaign.request')}}" class="covid-btn btn-red">Request</a>
                        </div>
                    </div>
                    <div class="search-bar">
                        <span><img src="{{asset('client_assets')}}/images/search.png" > Search Here</span>
                        <form action="{{route('frontend.campaign.search')}}" method="GET" enctype="multipart/form-data" class="col-12">
{{--                            @csrf--}}
                            <input type="text" name="search" id="search">
                            <button type="submit" class="d-none"></button>
                        </form>
                    </div>
                </div>
                <div class="navigation">
                    <div class="close-btn">
                        <img src="{{asset('client_assets')}}/img/icons/close.png">
                    </div>
                </div>
            </div>
        </header>
    </header>
    <!---------------------------------- Header Wrapper Ends ----------------------------------->



    <!-------------------------------- Content Wrapper Starts ---------------------------------->
    <div id="content-wrapper">

        <script>
            function submitLogoutForm() {
                $("#logout_form").submit();
            }
        </script>
