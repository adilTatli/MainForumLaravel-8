@extends('user.layouts.layout')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>Авторизация</b>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary mt-2">
                                <a href="{{ route('register.store') }}" class="text-center">Регистрация</a>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
