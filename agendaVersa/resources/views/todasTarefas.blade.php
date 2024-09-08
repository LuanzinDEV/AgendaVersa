<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('assets/css/todasTarefas.css')}}">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('home') }}" class="btn-home">Voltar para Home</a>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Hora Início</th>
                <th>Hora Fim</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
            <tr>
                <td>{{ $tarefa->titulo }}</td>
                <td>{{ $tarefa->descricao }}</td>
                <td>{{ ($tarefa->hora_inicio) }}</td>
                <td>{{ ($tarefa->hora_fim) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</body>
</html>