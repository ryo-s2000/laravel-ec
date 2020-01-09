@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <!-- TODO: 販売開始ページ作成 -->
            <a href="new" class="btn-flat-border">新しく販売を開始する</a>


        <div>
            販売中の作品
        </div>

            <div class="card">

                <div class="card-body">
                <!-- TODO: コンテンツ表示 -->
                    <div class="content-box">
                        <div class="content-info">
                            <img style="height:150px; width:200px;" src="https://laravel-ec.s3-ap-northeast-1.amazonaws.com/an.png"></img>
                        </div>

                        <div class="content-info">
                            <ul style="list-style: none;">
                                <li><a href="/1">遊園地</a></li>
                                <li>森P</li>
                                <li>500</li>
                                <li>はちゃめちゃする話です。</li>
                            </ul>
                        </div>

                        <div class="content-info">
                            <a href="/1/edit" class="btn-flat-border-edit">編集</a>
                            <a href="#" class="btn-flat-border-delete">削除</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
