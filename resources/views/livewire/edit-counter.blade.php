<div>
    <div class="d-flex mt-3">
        <h5 class="">Add Steps for task</h5>
        <span wire:click="increment" class="btn"><i class="fas fa-plus"></i></span>
    </div>
    {{-- @for($i = 0; $i < count($steps); $i++) --}}
    @foreach ($steps as $step)
        
    
    <div class="d-flex" wire:key="{{$loop->index}}">

    <input type="text" name="stepName[]" class="form-control mt-2" value="{{$step['name']}}">

    <input type="hidden" name="stepId[]" class="form-control mt-2" value="{{$step['id']}}">

    <span wire:click="decrement({{$loop->index}})" class="btn btn-link mt-2"><i class="fas fa-times text-danger"></i></span>
    </div>
    
    @endforeach
</div>
