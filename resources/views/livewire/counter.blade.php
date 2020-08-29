<div>
    <div class="d-flex mt-3">
        <h5 class="">Add Steps for task</h5>
        <span wire:click="increment" class="btn"><i class="fas fa-plus"></i></span>
    </div>
    {{-- @for($i = 0; $i < count($steps); $i++) --}}
    @foreach ($steps as $step)
        
    
    <div class="d-flex" wire:key="{{$step}}">
    <input type="text" name="step[]" class="form-control mt-2" placeholder="{{'Describe Step '. ($step+1)}}">
    <span wire:click="decrement({{$loop->index}})" class="btn btn-link mt-2"><i class="fas fa-times text-danger"></i></span>
    </div>
    @endforeach
</div>
