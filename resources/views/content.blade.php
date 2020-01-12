@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if (count($errors) > 0)
        <!-- Form Error List -->
            <div class="alert alert-danger">
                <strong>エラーが発生しています！</strong>

                <br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card">
                <div class="card-body">
                    @if ($content ?? '')
                        <form method="post" action="/{{$content->id}}/edit" class="search_container">
                            @csrf

                            <div>
                                画像を選択
                                <!-- TODO 画像選択処理 -->
                                <button>ファイルを開く</button>
                            </div>

                            <div>
                                タイトル
                                <input type="text" size="50" name="title" value="{{$content->title}}">
                            </div>

                            <div>
                                販売日
                                <input type="datetime-local" name="datetime" value="{{preg_replace('/ /', 'T', $content->release)}}">
                            </div>

                            <div>
                                値段
                                <input type="number" size="50" name="price" value="{{$content->price}}">
                            </div>

                            <div>
                                説明
                                <textarea name="description">{{$content->description}}</textarea>
                            </div>

                            <div>
                                <input type="submit" value="保存">
                            </div>

                        </form>
                    @else
                        <form method="post" action="/newcontent" class="search_container">
                            @csrf

                            <div>
                                画像を選択
                                <!-- TODO 画像選択処理 -->
                                <button>ファイルを開く</button>
                            </div>

                            <div>
                                タイトル
                                <input type="text" size="50" name="title" placeholder="">
                            </div>

                            <div>
                                販売日
                                <input type="datetime-local" name="datetime" value="{{$datetime}}T12:00">
                            </div>

                            <div>
                                値段
                                <input type="number" size="50" name="price" placeholder="">
                            </div>

                            <div>
                                説明
                                <textarea name="description"></textarea>
                            </div>

                            <div>
                                <input type="submit" value="保存">
                            </div>

                        </form>
                    @endif

            </div>

        </div>
    </div>
</div>
@endsection
