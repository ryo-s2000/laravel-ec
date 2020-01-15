@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <div>
                        <div>
                        <h3>{{$content->title}}</h3>
                        <a style="width:25%;" class="btn-flat-border" href="https://twitter.com/intent/tweet?url=http://13.231.161.57/{{$content->id}}&text={{$content->title}}/{{ $username }}&hashtags=laravel-ec" target="blank_">
                            Twiiterでシェアする
                        </a>

                        <img style="" src="{{$content -> imagespath}}">
                        </div>
                        <div>
                            <ul style="list-style: none;">
                                <li>発売日 : {{$content->release->format('Y年m月d日 H時')}}</li>
                                <li>ユーザー : {{ $username }}</li>
                                <li>値段 : {{$content -> price}}円</li>
                            </ul>
                        </div>
                            {{$content -> description}}
                        </div>
                </div>
            </div>

            <div style="margin: 10px;"><h4>ユーザーコメント</h4></div>

            <div class="comments">
                @if (count($comments) > 0)
                    @foreach ($comments as $key => $comment)
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h5>{{$comment->title}}</h5>
                                    {{$comment->created_at->format('Y年m月d日 H時')}} {{$commentusernames[$key]}}さん<br>
                                    {{$comment->content}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="newcomment">
                        <h4>コメントを投稿する</h4>
                        <form action="/{{$content->id}}/newcomment" method="POST">
                            @csrf
                            コメントタイトル<br>
                            <input size="60" name="commenttitle" placeholder="タイトルを入力"><br>
                            コメント内容<br>
                            <textarea cols="60" rows="4" name="comment" placeholder="コメントを入力"></textarea>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
