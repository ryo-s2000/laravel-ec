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
                            <img style="" src="{{$content -> imagespath}}"></img>
                        </div>
                        <div>
                            <ul style="list-style: none;">
                                <!-- releaseに正しいデータを詰める(TODO) -->
                                <li>発売日 : {{$content->created_at->format('Y年m月d日 H時')}}</li>
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
