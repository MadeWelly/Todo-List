@if($todo->completed)

              <button onclick="event.preventDefault();
                                document.getElementById('form-complete-{{$todo->id}}').submit()" class="btn btn-link" style="opacity: 1;
                                color: green ;"><i class="fas fa-check"></i></button>

              <form id="{{'form-complete-'.$todo->id}}" action="{{route('todos.incomplete', $todo->id)}}" method="post" style="display: none">
                @csrf
                @method('delete')
              </form>

              @else

              <button onclick="event.preventDefault();
                                document.getElementById('form-complete-{{$todo->id}}').submit()" class="btn btn-link" style="opacity: .3"><i class="fas fa-check"></i></button>

            <form id="{{'form-complete-'.$todo->id}}" action="{{route('todos.complete', $todo->id)}}" method="post" style="display: none">
            @csrf
            @method('put')
            </form>
              @endif