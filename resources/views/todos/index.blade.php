@extends('todos/layout')
<a href="{{route('home')}}" class="btn btn-primary m-3">Home</a>
@section('content')
  <h1>All Your Todos</h1>
  <x-alert/>
<a href="{{route('todos.create')}}" class="btn btn-primary mb-4">Create New</a>
  <div style="width: 600px; margin:auto">
    <ul class="list-group">
          
      @forelse ($todos as $todo)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        @include('todos.complete-button')

        @if ($todo->completed)
      <a href="{{route('todos.show',$todo->id)}}" class="text-dark"><del>{{$todo->title}}</del></a>
        @else
        <a href="{{route('todos.show',$todo->id)}}" class="text-dark">{{$todo->title}}</a>
        @endif
            <div class="btn-group" role="group" aria-label="Basic example">

              <a href="{{route('todos.edit',$todo->id)}}" class="btn btn-link"><i class="fas fa-edit"></i></a>
              <button onclick="event.preventDefault();
                              if(confirm('Are you really want to delete ?'))
                                document.getElementById('form-delete-{{$todo->id}}').submit()" class="btn btn-link text-danger" style=""><i class="fas fa-trash"></i></button>
              
              <form id="{{'form-delete-'.$todo->id}}" action="{{route('todos.destroy', $todo->id)}}" method="post" style="display: none">
                @csrf
                @method('delete')
              </form>
        </div>
      </li>
      @empty
      <li class="list-group-item d-flex justify-content-center align-items-center"><p>No task available, create one.</p></li>          
      @endforelse
    </ul>
  </div>
@endsection

