<div class="col-md-12">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<div class="col-md-12">
@if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message') }}
    </div>
@endif
</div>

<div class="col-md-12">
@if (Session::has('flash_message'))
    <div class="alert alert-success">
        {{Session::get('flash_message') }}
    </div>
@endif
</div>