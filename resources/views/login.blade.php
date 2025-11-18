{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FiveTech - Login</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem-vindo!</h1>
                                </div>

                                <div id="alert-container"></div>

                                <form method="POST" action="{{ route('login') }}" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Escreva seu e-mail" value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Senha" required>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="Esqueceu a senha.html">Esqueceu a senha?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ url('/register') }}">Criar uma nova conta</a>
                                </div>
                            </div>
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

<script>
$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        $('#alert-container').html(''); // Limpa mensagens anteriores

        $.ajax({
            url: "{{ route('login') }}",
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                // Login bem-sucedido
                localStorage.setItem('token', response.data.token);
                alert(response.message);
                window.location.href = '/dashboard';
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let html = '<div class="alert alert-danger">';
                    $.each(errors, function(key, value) {
                        html += value + '<br>';
                    });
                    html += '</div>';
                    $('#alert-container').html(html);
                } else if(xhr.status === 401) {
                    $('#alert-container').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
                } else {
                    $('#alert-container').html('<div class="alert alert-danger">Ocorreu um erro inesperado.</div>');
                }
            }
        });
    });
});
</script>

</body>
</html>
