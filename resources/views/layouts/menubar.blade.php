<section class="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img class="logo" src="{{asset('assets/images/logo.PNG')}}"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="d-flex profile">
                        <img class="notify-icon me-2" src="{{asset('assets/images/notification.png')}}">
                        <div class="dropdown">
                            <img class="profile-icon me-2 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" src="{{asset('assets/images/avatar.png')}}">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </section>
    <section style="margin-top: 40px;margin-bottom: 40px;padding: 0px 30px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div class="box">