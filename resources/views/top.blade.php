@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <!-- TODO: コンテンツ表示 -->
                    <div style="display:flex;">
                        <div>
                            <img style="height:150px; width:200px;" src="https://laravel-ec.s3-ap-northeast-1.amazonaws.com/an.png"></img>
                        </div>
                        <div>
                            <ul style="list-style: none;">
                                <li><a href="/1">遊園地</a></li>
                                <li>森P</li>
                                <li>500</li>
                                <li>はちゃめちゃする話です。</li>
                            </ul>
                        </div>
                        </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <!-- TODO: コンテンツ表示 -->
                    <div style="display:flex;">
                        <div>
                            <img style="height:150px; width:200px;" src="https://laravel-ec.s3-ap-northeast-1.amazonaws.com/gao.png"></img>
                        </div>
                        <div>
                            <ul style="list-style: none;">
                                <li><a href="/2">がおーーー</a></li>
                                <li>NP</li>
                                <li>600</li>
                                <li>おおかみさんでごぜーます。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
