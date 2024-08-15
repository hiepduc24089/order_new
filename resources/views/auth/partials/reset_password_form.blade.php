{!! Form::open(['route' => 'password.reset', 'class' => 'card-body pt-3', 'id' => 'reset_password', 'name' => 'reset_password']) !!}
@if($errors->any())
    <div class="alert alert-danger alert_message">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    {!! Form::label('email', 'Email Address', ['class' => 'form-label']) !!}
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fe fe-lock" aria-hidden="true"></i></span>
        </div>
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) !!}
    </div>
</div>


<div class="form-group mb-4">
    <div class="row" style="margin: 0;">
        <a href="{{route('login.index')}}" class="btn btn-light w-100">Back</a>
        {!! Form::submit('Send Email Password Reset', ['class' => 'btn btn-primary mt-2 w-100']) !!}
    </div>
</div>
{!! Form::close() !!}
