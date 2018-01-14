@extends('layouts')

@section('content')
<!--content-->
<div class="right-content">
    <section class="panel">
        <div class="panel-header">
            <a href="article.html">
                <img src="/7b646a41ff7b80ae6a979f10921a4705.jpg" alt="img">
            </a>
        </div>
        <div class="panel-body">
            <h2><a href="article.html">文章标题</a></h2>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
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
    <section class="panel">
        <div class="panel-header">
            <a href="#">
                <img src="/7b646a41ff7b80ae6a979f10921a4705.jpg" alt="img">
            </a>
        </div>
        <div class="panel-body">
            <h2><a href="#">文章标题</a></h2>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
            <p>文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容文章内容</p>
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
</div>
<!--content end-->

<!--pagination -->
<nav class="pagination">
    <ul>
        <li class="disabled"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</nav>
<!--pagination end-->
    @endsection