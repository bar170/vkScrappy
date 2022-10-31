@extends('auth.base')

@section('title')
    Логин
@endsection

@section('main')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Вход</h2>
                            <p class="text-white-50 mb-5">Введите учетные данные от сервиса vk-scrappy</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label class="form-label " for="typeEmailX">Электронная почта</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                <label class="form-label" for="typePasswordX">Пароль</label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Забыли пароль?</a></p>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Вход</button>
                            </form>


                        </div>

                        <div>
                            <p class="mb-0">Нет аккаунта? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Регистрация</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
