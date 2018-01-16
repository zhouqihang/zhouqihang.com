@extends('layouts')

@section('content')
    <!--content-->
    <div class="right-content">
        <section class="panel">
            <div class="panel-body">
                <h2 class="title"><a href="javascript:;">{{ base64_decode($article->title) }}</a></h2>
                <article class="markdown-body">
                    {!! base64_decode($article->content) !!}
                </article>
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
                        启航
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
                    <span id="star" class="star pull-right" data-article="{{ $article->id }}"></span>
                </p>
            </div>
        </section>
    </div>
    <!--content-->
@endsection

@section('script')
    <script type="text/javascript" src="/article.js"></script>
@endsection