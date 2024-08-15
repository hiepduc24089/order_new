<div class="header">
    <nav class="navbar py-4">
        <div class="container-xxl">
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                <div class="dropdown zindex-popover">
                    <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="assets/images/flag/GB.png"  width="24px" height="24px" alt="">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                        <div class="card border-0">
                            <ul class="list-unstyled py-2 px-3 mb-0">
                                <li class="mb-2">
                                    <a href="#" class="d-flex" style="gap: 8px">
                                        <img src="assets/images/flag/VN.png" width="24px" height="24px" alt="">
                                        Tiếng Việt
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="d-flex" style="gap: 8px">
                                        <img src="assets/images/flag/GB.png" width="24px" height="24px" alt="">
                                        English
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" class="d-flex" style="gap: 8px">
                                        <img src="assets/images/flag/CN.png" width="24px" height="24px" alt="">
                                        中文
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm ">
                            <span class="font-weight-bold">{{Auth::user()->name}}</span>
                        </p>
                        <small>{{Auth::user()->role->name}}</small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                       data-bs-toggle="dropdown" data-bs-display="static">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle"
                                         src="assets/images/avatar.png" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold">{{Auth::user()->name}}</span></p>
                                        <small class="">{{Auth::user()->email}}</small>
                                    </div>
                                </div>
                                <div>
                                    <hr class="dropdown-divider border-dark">
                                </div>
                            </div>
                            <div class="list-group m-2 ">
                                <a href="#" class="list-group-item list-group-item-action border-0 ">
                                    <i class="icofont-ui-user fs-5 me-3"></i>
                                    Profile Page
                                </a>
                                <a href="{{route('password.change')}}" class="list-group-item list-group-item-action border-0 ">
                                    <i class="icofont-file-text fs-5 me-3"></i>
                                    Change Password
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="list-group-item list-group-item-action border-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style=" color: black">
                                        <i class="icofont-logout fs-5 me-3"></i>
                                        Signout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button"
                    data-bs-toggle="collapse" data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                <div class="input-group flex-nowrap input-group-lg">
                    <h4>Danh sách đơn ký gửi</h4>
                </div>
            </div>

        </div>
    </nav>
</div>
