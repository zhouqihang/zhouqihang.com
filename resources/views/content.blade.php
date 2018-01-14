@extends('layouts')

@section('content')
    <!--content-->
    <div class="right-content">
        <section class="panel">
            <div class="panel-header">
                <a href="#">
                    <img src="images/img.jpg" alt="img">
                </a>
            </div>
            <div class="panel-body">
                <article>
                    <h2><a href="#">文章标题</a></h2>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                    <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
                </article>
                <div class="panel-star">
                            <span id="star-handle" class="star-container">
                            <span class="star-text">觉得不错，赏颗星星</span>
                            <span class="star-box">
                                <span id="star" class="star"></span>
                            </span>
                            </span>
                </div>
            </div>

            <div class="panel-footer">
                <p>
                            <span>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-rili"></use>
                            </svg>
                            2017-03-03
                        </span>
                    <span>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-zuozhe"></use>
                            </svg>
                            周启航
                        </span>
                    <span>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-star"></use>
                            </svg>
                            7
                        </span>
                    <span>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-icasqlistread"></use>
                            </svg>
                            200
                        </span>
                </p>
            </div>
        </section>
    </div>
    <!--content-->
@endsection