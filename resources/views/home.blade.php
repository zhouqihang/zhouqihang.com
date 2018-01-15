@extends('layouts')

@section('content')
    <!--content-->
    <div class="right-content">
        @foreach($articles as $article)
        <section class="panel">
            <div class="panel-body">
                <h2><a href="{{ route('content', ['article' => $article->id]) }}">{{base64_decode($article->title)}}</a></h2>
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
                    <a href="{{ route('content', ['article' => $article->id]) }}" class="btn btn-radius btn-s2 pull-right-responsive">
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