@extends('todos/layout')
<a href="{{route('home')}}" class="btn btn-primary m-3">Home</a>
@section('content')
  
  <x-alert/>
  <div style="width: 600px; margin:auto">
    <ul class="list-group">

      <li class="list-group-item d-flex justify-content-between align-items-center">
        <h4>Title : {{$todo->title}}</h4>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <h4 >Description : {{$todo->description}}</h4>
      </li>
      @if ($todo->steps->count() > 0)
      @foreach ($todo->steps as $step)
          
      
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <h4 >Step : {{$step->name}}</h4>
      </li>    
      @endforeach
      @endif
    </ul>
  </div>
@endsection

