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

@section('css')
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/github-gist.min.css" rel="stylesheet">
@endsection

@section('script')
    <script type="text/javascript" src="/article.js"></script>
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection