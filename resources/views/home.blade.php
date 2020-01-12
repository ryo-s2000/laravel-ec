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

            <!-- Contents -->
            @if (count($contents) > 0)
                @foreach ($contents as $key => $content)
                    <div class="card">
                        <div class="card-body">
                            <div style="display:flex;">
                                <div>
                                    <img style="height:150px; width:200px;" src="{{ $content->imagespath }}"></img>
                                </div>
                                <div>
                                    <ul style="list-style: none;">
                                        <li><a href="/{{ $content->id }}">{{ $content->title }}</a></li>
                                        <li>{{ $usernames[$key] }}</li>
                                        <li>{{ $content->price }}円</li>
                                        <li>{{ $content->description }}</li>
                                    </ul>
                                </div>
                                <div class="content-info">
                                    <a href="/1/edit" class="btn-flat-border-edit">編集</a>
                                    <a href="#" class="btn-flat-border-delete">削除</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
@endsection
