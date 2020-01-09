@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                <form method="get" action="/home" class="search_container">
                <!-- TODO: フォーマット作成 -->

                <div>
                画像を選択
                <button>ファイルを開く</button>
                </div>

                <div>
                タイトル
                <input type="text" size="50" placeholder="">
                </div>

                <div>
                販売日
                <input type="text" size="50" placeholder="">
                </div>

                <div>
                値段
                <input type="text" size="50" placeholder="">
                </div>

                <div>
                説明
                <textarea></textarea>
                </div>

                <div>
                <input type="submit" value="保存">
                </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
