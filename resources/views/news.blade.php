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
    <div id="loader-logo" class="animate__fadeOutLeft"><img src="{{route('index')}}/../webassets/imgs/logo.svg" alt=""></div>
    <img id="loader-bar" class="animate__zoomOut" src="{{route('index')}}/../webassets/imgs/three-dots.svg">
</div>

<div class="forum-page">
    <div id="navigation" class="navigation ">




    </div>
    <div class="forum-content">
        <!-- Backgrounds -->
        <div class="header-background">
            <img class="bg" src="{{route('index')}}/../webassets/imgs/bg.jpg">
        </div>

        <div id="bread-crumb" class="bread-crumb g-wrapper">
            <div class="breadcrumb">
                انتم هنا :&nbsp;&nbsp;»&nbsp;الأخبار
            </div>
            <div class="resize-button">
                <div class="rgt-button"><button type="button" value="increase" class="increaseFont" title="تكبير الخط">ع+</button></div>
                <div class="lft-button"><button type="button" value="decrease" class="decreaseFont" title="تصغير الخط"> ع-</button></div>
            </div>
        </div>

        <div class="body  ">
            <div class="page-content content int-content forum-m g-wrapper">
                <!-- Competion -->
                <!--  -->
                <div id="uid_4298" class="" style="">
                    <h2 class="csc-firstHeader">المستجدات</h2>





                    <div class="news">

                        <!--TYPO3SEARCH_end-->

                        <div class="news-list-view" id="news-container-4298">
                            @foreach ($articles as $art)
                                <div class="news-item">
                                <div class="news-img">


                                    <a title="{{$art->title}}" >


                                        <img src="{{route('index')}}/../webassets/imgs/{{$art->image}}" width="1600" height="1066" alt="">




                                    </a>


                                </div>
                                <div class="details articletype-0" itemscope="itemscope" itemtype="http://schema.org/Article">



                                    <!-- header -->
                                    <div class="header">
                                        <a title="{{$art->title}}" >
                                            <span itemprop="headline">{{$art->title}}</span>
                                        </a>
                                    </div>


                                    <!-- teaser -->
                                    <div class="desc">


                                        <div itemprop="description">
                                            <p>
                                                {{$art->description}}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- footer information -->
                                    <div class="actions">
                                        <p>
                                            <!-- date -->
                                            <span class="date">
                                                <time datetime="{{date('d-m-Y', strtotime($art->created_at))}}">
                                                    {{date('d-m-Y', strtotime($art->created_at))}}
                                                    <meta itemprop="datePublished" content="{{date('d-m-Y', strtotime($art->created_at))}}">
                                                </time>
                                            </span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!--TYPO3SEARCH_begin-->

                    </div>
                </div>

                <!--  -->
                <!-- End Competion -->
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top" style="display: none;"><i class="fa fa-angle-up"></i></button>
        </div>
    </div>
</div>

<script src="{{route('index')}}/../webassets/js/bundle.js.download"></script>

<script src="{{route('index')}}/../webassets/js/script.js.download" type="text/javascript"></script>

<script>
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>

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

<script type="text/javascript">
    $(document).ready(function() {
        $(".increaseFont,.decreaseFont").click(function() {
            var type = $(this).val();
            var curFontSize = $('.page-content p').css('font-size');
            if (type == 'increase') {
                $('.page-content p').css('font-size', parseInt(curFontSize) + 1);
            } else {
                $('.page-content p').css('font-size', parseInt(curFontSize) - 1);
            }
            //alert($('.data').css('font-size'));
        });
    });

</script>





@endsection
