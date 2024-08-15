{!! Form::open(['route' => 'password.update', 'class' => 'card-body pt-3', 'id' => 'change_password', 'name' => 'change_password']) !!}
@if($errors->any())
    <div class="alert alert-danger alert_message">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    {!! Form::label('current_password', 'Current Password', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-lock" aria-hidden="true"></i></span>
        </div>
        {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Current Password', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('new_password', 'New Password', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-lock" aria-hidden="true"></i></span>
        </div>
        {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'New Password', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group mb-6">
    {!! Form::label('new_password_confirmation', 'Confirm New Password', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-lock" aria-hidden="true"></i></span>
        </div>
        {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm New Password', 'required' => 'required']) !!}
    </div>
</div>

<div class="form-group mb-4">
    <div class="row" style="margin: 0;">
        <a href="{{route('home.index')}}" class="btn btn-light w-100">Back</a>
        {!! Form::submit('Update Password', ['class' => 'btn btn-primary mt-2 w-100']) !!}
    </div>
</div>
{!! Form::close() !!}
