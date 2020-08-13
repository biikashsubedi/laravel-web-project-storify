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

                    <table class="table">
                        <body>
                        <p class="font-light-bold">
                            <strong>Body:</strong> {{$story->body}}
                            <div class="font-italic">
                                <br>
                                {{$story->footnote}}
                            </div>
                        </p>
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
