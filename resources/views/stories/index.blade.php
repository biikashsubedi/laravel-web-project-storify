@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-primary"><h3>Story Page</h3></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
{{--                                <th>Tags</th>--}}
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $story)
                                <tr>
                                    <td><img src="{{$story->thumbnail}}" alt="image"></td>
                                    <td>{{$story->title}}</td>
{{--                                    <td>--}}
{{--                                        @foreach($$story->$tags as $tag)--}}
{{--                                            {{$tag->name}}--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
                                    <td>{{$story->type}}</td>
                                    <td>{{$story->status == 1 ? 'yes':'No'}}</td>
                                    <td>
                                        @can('view', $story)
                                            <a href="{{route('stories.show', [$story])}}"
                                               class="btn btn-success">View</a>
                                        @endcan
                                        @can('update', $story)
                                            <a href="{{route('stories.edit', [$story])}}"
                                               class="btn btn-warning">Edit</a>
                                        @endcan
                                        @can('delete', $story)
                                            <form action="{{route('stories.destroy', [$story])}}" method="POST"
                                                  style="display:inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
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
