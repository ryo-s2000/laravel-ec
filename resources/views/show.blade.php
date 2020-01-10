@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-body">
                <!-- TODO: コンテンツ表示 -->
                    <div>
                        <div>
                        <h3>{{$content -> title}}</h3>
                            <img style="" src="{{$content -> imagespath}}"></img>
                        </div>
                        <div>
                            <ul style="list-style: none;">
                                <li>発売日 : {{$content -> release}}(TODO)</li>
                                <li>ユーザー : NP(TODO)</li>
                                <li>値段 : {{$content -> price}}</li>
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
