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
                        <form method="post" action="/{{$content->id}}/edit" class="search_container" enctype="multipart/form-data">
                            @csrf

                            <div>
                                画像を変更
                                (表示中の画像)<img style="height:150px; width:200px;" src="{{ $content->imagespath }}"><br>
                                <input type="file" name="file">
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
                                <textarea name="description" rows="4" cols="40">{{$content->description}}</textarea>
                            </div>

                            <div>
                                <input type="submit" value="保存">
                            </div>

                        </form>
                    @else
                        <form method="post" action="/newcontent" class="search_container" enctype="multipart/form-data">
                            @csrf

                            <div>
                                画像を選択
                                <input type="file" name="file">
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
                                <textarea name="description" rows="4" cols="40"></textarea>
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
