@extends('todos/layout')
<a href="{{route('todos.index')}}" class="btn btn-outline-secondary m-2">Back</a>
@section('content')
<h1>What next you need To-Do</h1>
<x-alert/>
<form action="{{route('todos.store')}}" method="post" class="d-flex flex-column m-auto form-group" style="width: 400px;">
  @csrf
  <input type="text" name="title" class="form-control mt-2" placeholder="Title...">
  <textarea class="form-control mt-3" name="description" id="" cols="20" rows="5" placeholder="Description..."></textarea>
  @livewire('counter')
  <input class="btn btn-info mt-3" type="submit" value="Create">
</form>
@endsection
