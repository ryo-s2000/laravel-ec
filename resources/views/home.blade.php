@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="card-body">
            新しく販売を開始する！！+
            <!-- TODO: 販売開始ページ作成 -->
        </div>

            <div class="card">
                <div class="card-header">販売中のコンテンツ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    コンテンツを表示
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
