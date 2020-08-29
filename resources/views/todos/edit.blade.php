@extends('todos/layout')
<a href="{{route('todos.index')}}" class="btn btn-outline-secondary m-2">Back</a>
@section('content')
<h3 class="mb-3">Update This Todos Title</h3>
<x-alert/>
<form action="{{route('todos.update',$todo->id)}}" method="post" class="d-flex flex-column m-auto form-group" style="width: 400px;">
  @csrf
  @method('patch')
  <input type="text" name="title" class="form-control mt-2" value="{{$todo->title}}" placeholder="Title...">
<textarea class="form-control mt-3" name="description" id="" cols="20" rows="5" placeholder="Description...">{{$todo->description}}</textarea>
@livewire('edit-counter', ['steps' => $todo->steps])
  <input class="btn btn-info mt-3" type="submit" value="Update">
</form>
@endsection