@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-primary">
                        <strong>Story Page</strong>
                        <div class="float-right">
                            <a href="{{ route('index') }}">All</a>
                            |
                            <a href="{{ route('index', ['type' => 'short']) }}">Short</a>
                            |
                            <a href="{{ route('index', ['type'=>'long']) }}">Long</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Author</th>
                                <th>Release Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $story)
                                <tr>
                                    <td><img src="{{$story->thumbnail}}" alt="image"></td>
                                    <td><a href="{{route('dashboard.show', [$story])}}">{{$story->title}}</a></td>
                                    <td>{{$story->type}}</td>
                                    <td>{{$story->user->name}}</td>
                                    <td>{{$story->user->created_at->format('Y-m-d')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$stories->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
