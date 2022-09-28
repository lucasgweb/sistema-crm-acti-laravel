<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Login - SB Admin Pro</title>
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png"/>
    <script data-search-pseudo-elements defer
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
            crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                            <div class="card-body">
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <form method="post" action="{{route('login.authenticate')}}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Correo:</label>
                                        <input class="form-control" id="inputEmailAddress" type="email"
                                               placeholder="Ingresar correo" name="email" value="{{old('email')}}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPassword">Contraseña:</label>
                                        <input class="form-control" id="inputPassword" name="password" type="password"
                                               placeholder="Ingresar contraseña" />
                                    </div>
                                    <div class="mb-3">
                                        {{-- <div class="form-check">
                                             <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                              <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                        </div> --}}
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <x-btn-primary title="Login" type="submit"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer-admin mt-auto footer-dark">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>



