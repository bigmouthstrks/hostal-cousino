@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif



@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>

@endif

@if ($message = Session::get('validar'))

<div class="alert alert-info alert-block row">
    <strong>{{ $message }}</strong>
</div>

@endif

