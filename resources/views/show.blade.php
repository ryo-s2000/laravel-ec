@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-body">
                    <div>
                        <div>
                        <h3>{{$content -> title}}</h3>
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

        </div>
    </div>
</div>
@endsection
