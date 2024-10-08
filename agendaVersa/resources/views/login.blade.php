<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo!</h2>
                <p class="description description-primary">Mantenha-se organizado conosco</p>
                <button id="signin" class="btn btn-primary">Sign in</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Crie sua conta</h2>
                <p class="description description-second">Use seu e-mail para registro</p>

                <!-- Formulário de Registro -->
                <form class="form" action="{{ route('registrar') }}" method="POST">
                    @csrf
                    
                    <!-- Nome -->
                    <label class="label-input" for="nome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome">
                    </label>
                    @error('nome')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <!-- Sobrenome -->
                    <label class="label-input" for="sobrenome">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="sobrenome" value="{{ old('sobrenome') }}" placeholder="Sobrenome">
                    </label>
                    @error('sobrenome')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <!-- Email -->
                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    </label>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <!-- Senha -->
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </label>
                    @error('senha')
                        <span class="error">{{ $message }}</span>
                    @enderror

                    <!-- Confirmar Senha -->
                    <label class="label-input" for="senha_confirmation">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha_confirmation" placeholder="Confirme sua senha">
                    </label>

                    <button class="btn btn-second">Registrar</button>
                </form>
            </div>
        </div>

        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá!</h2>
                <p class="description description-primary">Registre-se</p>
                <p class="description description-primary">e comece a se organizar conosco</p>
                <button id="signup" class="btn btn-primary">Registre</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Login</h2>
                <p class="description description-second">Use seu e-mail para acesso</p>

                <!-- Formulário de Login -->
                <form class="form" action="{{ route('logar') }}" method="POST">
                    @csrf
                    <!-- Email -->
                    <label class="label-input" for="email">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email" placeholder="Email">
                    </label>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <!-- Senha -->
                    <label class="label-input" for="senha">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" placeholder="Senha">
                    </label>
                    @error('senha')
                            <span class="error">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-second">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="{{ url('assets/js/app.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif
    
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: '{{ $error }}',
                        confirmButtonText: 'OK'
                    });
                @endforeach
            @endif
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
