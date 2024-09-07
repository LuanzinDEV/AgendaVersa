<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('assets/css/tarefa.css') }}">
    <title>Tarefas</title>
</head>
<body>
    <div class="contact-us">
        <form action="{{ route('registrarTarefa') }}" method="POST">
            @csrf
            
            <input placeholder="Título" type="text" name="titulo" required>
            <input placeholder="Descrição" type="text" name="descricao">
            
            <label for="hora_inicio">Escolha uma hora de início</label>
            <input id="hora_inicio" type="datetime-local" name="hora_inicio" required>
            
            <label for="hora_fim">Escolha uma hora final</label>
            <input id="hora_fim" type="datetime-local" name="hora_fim" required>
            
            <button type="submit">Registrar tarefa</button>
            <a href="{{ route('home') }}" style="margin-top: 25px" class="btnBack">Início</a>
        </form>

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
    </div>
</body>
</html>
