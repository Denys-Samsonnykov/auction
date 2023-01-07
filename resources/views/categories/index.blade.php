@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>All Categories</h1>

@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <table class="table align-self-center">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">Title</th>
                        <th class="text-center" scope="col">Action</th>
                        <th class="text-center" scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-center" scope="col">{{ $category->title }}</td>
                            <td class="text-center" scope="col">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-info form-control">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('categories.delete', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger form-control" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
