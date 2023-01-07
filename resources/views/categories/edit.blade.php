@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Category: {{$category->title}}</h1>

@stop

@section('content')
    <form class="col-md-4 border" action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text"
                   name="title"
                   value="{{$category->title}}"
                   class="form-control @error('title') is-invalid @enderror"
                   maxlength="50"
                   id="title">
            <small id="titleHelp" class="form-text text-muted float-right">Maximum 50 characters</small>
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
@stop

@section('js')
 @include('categories.parts.js')
@stop
