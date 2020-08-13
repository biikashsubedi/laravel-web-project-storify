@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-capitalize text-success">{{$story->title}}</strong>
                        <a href="{{route('index')}}" class="btn btn-primary float-right">Go Back</a>
                    </div>

                    <div class="card-body">
                        <img class="card-img-top" src="{{ $story->thumbnail}}" alt="Card image cap">
                    <!-- {{ $story->body}}

                        <p class="font-italic">{{ $story->footnote}}</p> -->
                        <p class="card-text">{{ $story->body }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button"
                                        class="btn btn-sm btn-outline-secondary">{{$story->user->name}}</button>
                            </div>
                            <small class="text-muted">{{ $story->type}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--OLD BACKUP FILE--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <strong class="text-capitalize text-success">{{$story->title}}</strong>--}}
{{--                        <a href="{{route('index')}}" class="btn btn-primary float-right">Go Back</a>--}}
{{--                    </div>--}}

{{--                    <table class="table">--}}
{{--                        <body>--}}
{{--                        <p class="font-light-bold">--}}
{{--                            <strong>Body:</strong> {{$story->body}}--}}
{{--                            <div class="font-italic">--}}
{{--                                <br>--}}
{{--                                {{$story->footnote}}--}}
{{--                            </div>--}}
{{--                        </p>--}}
{{--                        </body>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
