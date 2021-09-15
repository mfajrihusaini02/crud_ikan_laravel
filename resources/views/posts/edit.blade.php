@extends('posts.template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Post</h2>
            </div>
            <div class="float-right">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors -> any())
        <div class="alert alert-danger">
            <strong>Whoopss!</strong> There were some problem with your input. <br><br>
            <ul>
                @foreach ($errors -> any() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post -> id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title : </strong>
                    <input type="text" name="title" id="title" value="{{ $post -> title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Content : </strong>
                    <textarea name="content" id="content" class="form-control" style="height: 150px;"> {{ $post -> content }} </textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection