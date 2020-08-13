@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-capitalize text-success">{{$story->title}}</strong>
                        <a href="{{route('stories.index')}}" class="btn btn-primary float-right">Go Back</a>
                    </div>

                    <table class="table">
                        <body>
                        <p class="font-light-bold">
                            <strong>Body:</strong> {{$story->body}}
                        </p>
                        <p>
                            <strong>Type:</strong> {{$story->type}}
                        </p>
                        <p>
                            <strong>Status:</strong> {{$story->status == 1 ? 'Yes':'No'}}
                        </p>
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
