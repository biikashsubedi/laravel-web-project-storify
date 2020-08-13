@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-primary"><h3>Edit Story</h3></div>

                    <div class="card-body">
                        <form action="{{route('stories.update', [$story])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('stories.form')

                            <button class="btn btn-primary btn-lg btn-block">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
