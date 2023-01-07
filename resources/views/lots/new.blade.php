@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>New Lot</h1>
@stop

@section('content')
    <form class="col-md-4 border" action="{{ route('lots.store') }}" method="POST">
        @csrf
        @method('POST')
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
                   value="{{old('title')}}"
                   class="form-control @error('title') is-invalid @enderror"
                   maxlength="60"
                   id="title">
            <small id="titleHelp" class="form-text text-muted float-right">Maximum 60 characters</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror"
                      name="description"
                      id="description">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id"
                    name="category_id"
                    class="form-control">
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

