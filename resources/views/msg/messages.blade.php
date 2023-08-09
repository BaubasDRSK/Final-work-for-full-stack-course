@if(session()->has('success'))
<div class="info-container alert-success">
    <p class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </p>
</div>
@endif
@if(session()->has('info'))
<div class="info-container alert-info">
    <p class="alert alert-info" role="alert">
        {{session()->get('info')}}
    </p>
</div>
@endif
@if(session()->has('warning'))
<div class="info-container alert-warning">
    <p class="alert alert-warning" role="alert">
        {{session()->get('warning')}}
    </p>
</div>
@endif