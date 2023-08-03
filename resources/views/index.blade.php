@extends('layouts.front')

@section('content')
    <style>
        .loading {
            position: fixed;
            width: 100vw;
            height: 100vh;
            z-index: 1000;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            background: white;

            row-gap: 30px;

        }

        .loading img {
            width: 70px;
        }

        .loading div img {
            width: 200px;
        }

    </style>

    <div id="loader" class="loading" style="visibility: visible; opacity: -0.04; display: none;">
        <div id="loader-logo" class="animate__fadeOutLeft"><img src="{{route('index')}}/../webassets/imgs/logo.png" alt=""></div>
        <img id="loader-bar" class="animate__zoomOut" src="{{route('index')}}/../webassets/imgs/three-dots.svg">
    </div>





    <div id="swipe" class="scaffold">
        <!-- Backgrounds -->
        <div class="backgrounds">
            <img class="bg" src="{{route('index')}}/../webassets/imgs/bg.jpg">
        </div>
        <!-- End Backgrounds -->

        <div class="navigation index">
            <!-- Appbar -->
            <div class="appbar dark-mode">
                <div class="trailing">
                    <!-- Menu Icon -->
                    <div class="g-icon flip-icon" onclick="popup(1)" style="display:none;">
                        <img class="dark" src="{{route('index')}}/../webassets/imgs/menu_white.svg">
                        <img class="normal" src="{{route('index')}}/../webassets/imgs/menu.svg">
                    </div>
                    <!-- End Menu Icon -->

                </div>
                <!-- Logo -->
                <div class="logo mobile">
                    <a href="{{route('index')}}" title="أمارة منطقة الجوف">
                        <img class="dark" src="{{route('index')}}/../webassets/imgs/logo_white.svg">
                        <img class="normal" src="{{route('index')}}/../webassets/imgs/logo.png">
                    </a>
                </div>
                <!-- End Logo -->

                <div class="actions"></div>
            </div>
        </div>


        <div class="scaffold-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- home Button -->
                <div page="1" class="menu-item active">
                    <span class="title">الاخبار</span>
                </div>
                <!-- end home Button -->

                <div class="spacer-15h"></div>

                @foreach ($categories as $cate)
                    <!-- home Button -->
                    <div page="{{$cate->id}}" class="menu-item">
                        <span class="title">{{$cate->name}}</span>
                    </div>
                    <!-- end home Button -->
                @endforeach
            </div>
            <!-- End Sidebar -->

            <!-- Body -->
            <div class="body">

                <!-- News Page -->
                <div class="page news-page" page-index="1" style="display: flex;">
                    <div class="page-title page-title-control" style="--animate-duration: 0.85s;">
                        <div class="title">
                            اهم الأخبار
                        </div>

                    </div>
                    <div class="page-sub-title" style="--animate-duration: 0.85s;"></div>
                    <div class="page-body owl-carousel news-c owl-theme owl-rtl owl-loaded owl-drag" style="--animate-duration: 0.85s;">

                        <!-- News Card Group -->

                        <!-- End News Card Group -->


                        <!-- News Card Group -->

                        <!-- End News Card Group -->

                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1315px;">
                                <!-- show every div news-card-grid in owl-item -->
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($articles as $article)
                                    @if($count % 2 == 1)
                                        <div class="owl-item active" style="width: auto; margin-left: 30px;">
                                            <div class="news-card-grid">
                                    @endif
                                            <!-- News Card -->
                                            <div class="news-card">
                                                <div id="uid_{{$article->id}}" class="news-home-portal" style="">





                                                    <div class="news">

                                                        <!--TYPO3SEARCH_end-->

                                                        <div class="news-list-view" id="news-container-{{$article->id}}">



                                                            <!--
                                                                        =====================
                                                                            Partials/List/Item.html
                                                                    -->
                                                            <div class="news-item">
                                                                <div class="news-img">


                                                                    <a title="" href="#">


                                                                        <img src="{{route('index')}}/../webassets/imgs/{{$article->image}}" width="1600" height="1066" alt="" style="opacity: 1;">




                                                                    </a>


                                                                </div>
                                                                <div class="details articletype-0" itemscope="itemscope" itemtype="http://schema.org/Article">



                                                                    <!-- header -->
                                                                    <div class="header">
                                                                        <a title="{{$article->title}}" href="#">
                                                                            <span itemprop="headline">
                                                                                {{$article->title}}
                                                                            </span>
                                                                        </a>
                                                                    </div>


                                                                    <!-- teaser -->
                                                                    <div class="desc">


                                                                        <div itemprop="description">
                                                                            <p>
                                                                                {{$article->description}}
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <!-- footer information -->
                                                                    <div class="actions">
                                                                        <p>
                                                                            <!-- date -->
                                                                            <span class="date">
                                                                                <time datetime="{{$article->created_at}}">
                                                                                    {{
                                                                                        date('d-m-Y', strtotime($article->created_at))
                                                                                    }}
                                                                                    <meta itemprop="datePublished" content="{{$article->created_at}}">
                                                                                </time>
                                                                            </span>

                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--TYPO3SEARCH_begin-->

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End News Card -->
                                    @if($count % 2 == 0)
                                            </div>
                                        </div>
                                    @endif
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                    </div>
                    <div class="home-more more-link">
                        <a href="{{route('news')}}">المزيد ...</a>
                    </div>

                </div>
                <!-- End News Page -->


                <!-- Home Page -->
                @foreach ($categories as $cate)
                    <div class="page home-page" page-index="{{$cate->id}}">

                        <div class="page-body">
                            <div class="home-slider owl-carousel home-c owl-theme owl-rtl owl-loaded owl-drag">

                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                                        <div class="owl-item">
                                            <div class="message-with-image">
                                                <div class="message-group">
                                                    <div class="page-title">{{$cate->name}}</div>
                                                    <div class="page-sub-title"></div>
                                                    <div class="message">
                                                        <div id="uid_16274" class="" style="">
                                                            {!!$cate->text!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Home Page -->
            </div>
            <!-- End -->
        </div>
    </div>

    <script>
        function fadeOutEffect() {
            var fadeTarget = document.getElementById("loader");
            var fadeEffect = setInterval(function() {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.08;
                } else {
                    clearInterval(fadeEffect);

                    document.querySelector("#loader").style.display = "none";

                }
            }, 50);
        }
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.visibility = "hidden";
                document.querySelector("#loader").style.visibility = "visible";
            } else {
                fadeOutEffect();
                document.querySelector("body").style.visibility = "visible";
            }
        };

    </script>

    <script src="{{route('index')}}/../webassets/js/bundle.js.download"></script>

    <script src="{{route('index')}}/../webassets/js/script.js.download" type="text/javascript"></script>




@endsection