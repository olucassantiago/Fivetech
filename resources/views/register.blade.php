<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FiveTech - Criar Conta</title>

    <!-- Fonts e estilos -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Criar conta</h1>
                        </div>

                        {{-- Mensagens de sucesso --}}
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Mensagens de erro --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="user">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user"
                                           placeholder="Nome completo" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <select name="role" class="form-control" required>
                                        <option value="">Selecione tipo</option>
                                        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="gerente" {{ old('role')=='gerente' ? 'selected' : '' }}>Gerente</option>
                                        <option value="vendedor" {{ old('role')=='vendedor' ? 'selected' : '' }}>Vendedor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                       placeholder="Escreva seu e-mail" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           placeholder="Senha" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                           placeholder="Repita a senha" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrar conta
                            </button>

                            <hr>
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Registrar com Google
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Registrar com Facebook
                            </a>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Esqueceu a senha?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Já tem uma conta? Login!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
