@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Lot: {{ $lot->title }}</h1>

@stop

@section('content')
    <form class="col-md-4 border" action="{{ route('lots.update', $lot) }}" method="POST">
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
                   value="{{$lot->title}}"
                   class="form-control @error('title') is-invalid @enderror"
                   maxlength="60"
                   id="title">
            <small id="titleHelp" class="form-text text-muted float-right">Maximum 60 characters</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      name="description"
                      id="description">{{$lot->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="select">Category</label>
            <select id="select"
                    name="category_id"
                    class="form-control">
                <option value="{{$lot->category->id}}">{{$lot->category->title}}</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
@stop

@section('js')
    @include('lots.parts.js')
@stop
