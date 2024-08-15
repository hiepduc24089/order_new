{!! Form::open(['route' => 'login.perform', 'class' => 'card-body pt-3', 'id' => 'login', 'name' => 'login']) !!}
@include('flash_messages')
<div class="form-group">
    {!! Form::label('username', 'Username', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-mail" aria-hidden="true"></i></span>
        </div>
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-eye-off" aria-hidden="true"></i></span>
        </div>
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>
</div>

<div class="form-group">
    <div class="custom-control custom-checkbox">
        {!! Form::checkbox('remember_me', '1', false, ['class' => 'custom-control-input', 'id' => 'remember_me']) !!}
        {!! Form::label('remember_me', 'Remember me', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<div class="submit">
    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block']) !!}
</div>

<div class="text-center mt-3">
    <p class="mb-2">{!! link_to_route('password.forgot', 'Forgot Password') !!}</p>
</div>

{!! Form::close() !!}
