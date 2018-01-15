@extends('layouts')

@section('content')
    <!--content-->
    <div class="right-content">
        <section class="panel">
            {{--<div class="panel-header">--}}
                {{--<a href="#">--}}
                    {{--<img src="images/img.jpg" alt="img">--}}
                {{--</a>--}}
            {{--</div>--}}
            <div class="panel-body">
                <article>
                    <h2><a href="javascript:;">{{ base64_decode($article->title) }}</a></h2>
                    {{!! base64_decode($article->content) !!}}
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
                            {{ $article->created_at }}
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
                            {{ $article->stars }}
                        </span>
                    <span>
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="#icon-icasqlistread"></use>
                            </svg>
                            {{ $article->hits }}
                        </span>
                </p>
            </div>
        </section>
    </div>
    <!--content-->
@endsection