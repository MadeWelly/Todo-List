@if (session()->has('image'))
<div class="alert alert-success">{{session()->get('image')}}</div>
@elseif(session()->has('error'))
<div class="alert alert-danger">{{session()->get('error')}}</div>
@endif