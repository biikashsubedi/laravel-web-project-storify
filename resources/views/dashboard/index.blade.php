@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Home Page</h1>
            <p class="lead text-muted">Great Stories from our Author</p>
            <p>
                <a href="{{ route('index') }}" class="btn btn-primary my-2">All</a>
                <a href="{{ route('index', ['type' => 'short']) }}" class="btn btn-secondary my-2">Short</a>
                <a href="{{ route('index', ['type' => 'long']) }}" class="btn btn-secondary my-2">Long</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach( $stories as $story)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="{{ route('dashboard.show', [$story] ) }}">
                                <img class="card-img-top" src="{{ $story->thumbnail}}" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{ $story->title }}</p>
                                @foreach( $story->tags as $tag)
                                    <button class="btn btn-sm btn-outline-primary">{{$tag->name}}</button>
                                @endforeach
                                <hr>
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
                @endforeach
            </div>

            {{ $stories->withQueryString()->links() }}
        </div>
    </div>
@endsection

@section('styles')
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
@endsection







{{--OLD FILE BACKUP--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header text-primary">--}}
{{--                        <strong>Story Page</strong>--}}
{{--                        <div class="float-right">--}}
{{--                            <a href="{{ route('index') }}">All</a>--}}
{{--                            |--}}
{{--                            <a href="{{ route('index', ['type' => 'short']) }}">Short</a>--}}
{{--                            |--}}
{{--                            <a href="{{ route('index', ['type'=>'long']) }}">Long</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Title</th>--}}
{{--                                <th>Type</th>--}}
{{--                                <th>Author</th>--}}
{{--                                <th>Release Date</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($stories as $story)--}}
{{--                                <tr>--}}
{{--                                    <td><img src="{{$story->thumbnail}}" onresize="" alt="image"></td>--}}
{{--                                    <td><a href="{{route('dashboard.show', [$story])}}">{{$story->title}}</a></td>--}}
{{--                                    <td>{{$story->type}}</td>--}}
{{--                                    <td>{{$story->user->name}}</td>--}}
{{--                                    <td>{{$story->user->created_at->format('Y-m-d')}}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        {{$stories->links()}}--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
