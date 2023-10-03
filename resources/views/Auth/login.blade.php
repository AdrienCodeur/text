<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}"> --}}

    <title>Document</title>
</head>

<body>


    <style>
        body {
            margin:0px ;
            padding:0px;
        }

        .gradient-custom {
            /* fallback for old browsers */
            /* background: #6a11cb; */

            /* Chrome 10-25, Safari 5.1-6 */
            /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
        }
    </style>
    <div class="container m-0 p-0 bg-muted ">
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body  mt-0 P-0 text-center">

                                <div class="d-flex justify-content-between  bg-secondary">
                                    @if (session('error'))
                                        <img src="{{ asset('assets/images/danger.png') }}" alt=""
                                            style="width: 80px;height:80px;">
                                        <div class='text-white fs-5 fw-bold text-center  p-2'> {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between  bg-success">
                                    @if (session('success'))
                                        <div class='text-white fs-5 fw-bold text-center  p-2'> {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password !</p>
                                        <form action="{{ route('login') }}" method="post">
                                            @csrf
                                            @method('post')
                                            <div class="form-outline form-white mb-4">
                                                <input type="email" id="typeEmailX"
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror "
                                                    name='email' value="{{ old('email') }}" />
                                                @error('email')
                                                    <p class='invalid-feedback'>{{ $message }}</p>
                                                @enderror
                                                <label class="form-label" for="typeEmailX">Email</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="password" id="typePasswordX"
                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                    name='password' />
                                                @error('password')
                                                    <p class='invalid-feedback'> {{ $message }} </p>
                                                @enderror
                                                <label class="form-label" for="typePasswordX">Password</label>
                                            </div>

                                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Se
                                                connecter</button>


                                        </form>
                                    </div>

                                    <div>
                                        <p class="mb-0">Vous n' avez pas de compte? <a href="#"
                                                class="text-white-50  fw-bold">Créer un Compte</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>

</html>
