@extends('auth.app')

@section('content')
    <div class="page  responsive-log login-bg">

        <div class="dropdown custom-layout">
            <div class="demo-icon nav-link  icon  float-end mt-5 me-5">
                <i class="fe fe-settings fa-spin text_primary"></i>
            </div>
        </div>

        <!-- PAGE -->

        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                                <div class="card my-5">
                                    <div class="p-4 pt-6 text-center">
                                        <h1 class="mb-2">Change Password</h1>
                                    </div>
                                    @include('auth.partials.change_password_form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
