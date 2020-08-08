<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Hal Ehwal Akademik.
  </title>

  <link href="{{ asset('store/admin2.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('theme/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('theme/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('theme/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="bg-default" cz-shortcut-listen="true">
@include('sweetalert::alert')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/">
                  <img src="store/logo1.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
        </div>
      </div>
    </nav>    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8" >
      <div class="container">
        <div class="header-body text-center mb-3">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white" data-aos="fade" data-aos-duration="1000">Selamat Datang!</h1>
              <p class="text-lead text-light">"Sistem Hal Ehwal Akademik"</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sila Log Masuk</small>
              </div>
              <form role="form" method="post" action="{{ route('login') }}">
              @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <span data-feather="alert-circle"></span><strong>&nbsp;Opps!</strong>, Email atau kata laluan salah.
          </div>
        @endif
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" required autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control is-invalid" placeholder="Kata Laluan" type="password" name="password" required autocomplete="off">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger my-4 btn-block">Log Masuk</button>
                  <!-- <a type="button" data-toggle="modal" data-target="#newRegister" class="btn btn-danger my-4" href="/register" >Register</a> -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newRegister" tabindex="-1" role="dialog" aria-labelledby="newRegisterLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <form method="post" action="{{ route('register') }}">
            @csrf
            <div class="modal-body">
                <h6 class="heading-small text-muted mb-4">New Register</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control form-control-alternative" placeholder="Your Name" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('E-Mail Address') }}</label>
                        <input type="email" name="email" class="form-control form-control-alternative" placeholder="Email Address " autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Address') }}</label>
                        <input type="text" name="address" class="form-control form-control-alternative" placeholder="Your Address " autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Phone Number') }}</label>
                        <input type="text" name="phone" class="form-control form-control-alternative" placeholder="Phone Number" autocomplete="off" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Stockist Name') }}</label>
                        <input type="text" name="stockistname" class="form-control form-control-alternative" placeholder="Stockist Name" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Stockist Description') }}</label>
                        <textarea name="stockistdescription" class="form-control form-control-alternative" placeholder="Stockist Description" autocomplete="off" required></textarea>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group ">
                        <label class="form-control-label ">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control form-control-alternative" placeholder="Password " autocomplete="off" required>
                        <small class="text-danger" id="msgMinPass">Minimum password at least 8 character</small>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control form-control-alternative" placeholder="Confirm Password" autocomplete="off" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" >Date : {{ \Carbon\Carbon::today()->format('d-m-Y') }}</label>
                      </div>
                    </div>
                  </div>
                <hr class="my-1" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>


    <footer class="py-1">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Hal Ehwal Akademik</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>  </div>
  <!--   Core   -->
    <script src="{{ asset('theme/js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('theme/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('theme/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $(document).ready(function(){
AOS.init();
      var strokeCount = 0;
      var total;
      $('#password').keyup(function(){
        total = $(this).val().length;
        if(total >= 8){
          $('#msgMinPass').text('Good').removeClass('text-danger').addClass('text-success');
        } else {
          $('#msgMinPass').text('Minimum password at least 8 character').removeClass('text-success').addClass('text-danger');
        }
      });
    });

    </script>
</body></html>