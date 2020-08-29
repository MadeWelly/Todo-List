<div>
    {{$slot}}
    @if (session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            
        </div>
    @endif
</div>