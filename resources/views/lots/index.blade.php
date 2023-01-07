@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1> All Lots</h1>

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <form method="GET" action="{{route('lots.index')}}">
                    <div class="form-group">
                        <label for="select">Categories: </label>
                        <select class="form-select" name="select">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply filter</button>
                </form>
            </div>
            <div class="col-md-12">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <div class="row">
                            @each('lots.parts.lot_view', $lots, 'lot')
                        </div>
                    </div>
                </div>
            </div>
                        {{ $lots->appends(Request::all())->links() }}
        </div>
    </div>
@stop

@section('js')

@stop
