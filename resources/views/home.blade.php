@extends('layouts')

@section('content')
    <!--content-->
    <div class="right-content">
        @foreach($articles as $article)
        <section class="panel">
            <div class="panel-body">
                <h2><a href="article.html">{{base64_decode($article->title)}}</a></h2>
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
                    <a href="#" class="btn btn-radius btn-s2 pull-right-responsive">
                        阅读全文&nbsp;
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-go"></use>
                        </svg>
                    </a>
                </p>
            </div>
        </section>
        @endforeach
    </div>
    <!--content end-->

    {{ $articles->links() }}

@endsection