@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header btn btn-dark">{{ __('Dashboard') }}</div>
                <div class="card-body">
                @if (Session::has('alert-success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('alert-success') }}
                </div>
                @endif
                @if (Session::has('alert-danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('alert-danger') }}
                </div>
                @endif
                <div class="dropdown">
                    <a href="{{ route('todos.create') }}" class="btn btn-secondary dropdown-toggle"  id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        MENU
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a href="{{ route('home') }}" class="dropdown-item">Home</a></li>

                    </ul>
                    </div>
                    <br>
                <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
                <br><br>
                @if (count($todos)>0)
    <table class="table">
    <tr>
      <td class="table-danger">TITLE</td>
      <td class="table-success">DESCRIPTION</td>
      <td class="table-warning">COMPLETED</td>
      <td class="table-info">ACTIONS</td>
    </tr>
    <tbody>
        @foreach ($todos as $todo)
        <tr>
            <td>{{$todo->title}}</td>
            <td>{{$todo->description}}</td>
            <td>
                @if($todo->is_completed==1)
                <a href="{{route('todos.completed', $todo->id)}}" class="btn btn-success">Completed</a>
                @else
                <a href="{{route('todos.completed', $todo->id)}}" class="btn btn-danger">Not Completed</a>
                @endif
            </td>
            <td id="outer">
                <a href="{{route('todos.show', $todo->id)}}" class="btn btn-info">View</a>
                <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('todos.Delete', $todo->id)}}" class="btn btn-danger">Delete</a>
                </form>
            </td>
        <td>
        @endforeach
    </tbody>
</table>

    @else
    <h4>No todos found</h4>
    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
