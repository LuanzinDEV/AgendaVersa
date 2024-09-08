<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('assets/css/home.css') }}">
    <title>Calendário Dinâmico</title>
</head>
<body>
    <div class="top-bar">
        <span class="user-name">Olá, {{ $nome }} {{ $sobrenome }}</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Sair</button>
        </form>
    </div><!-- top-bar -->

    <div class="container">
        <div class="calendar-left">
            <div class="num-date">{{ $currentDayFormatted }}</div><!-- num-date -->
            <div class="current-events">
                <strong>Tarefas do dia selecionado</strong><br/>
                <ul>
                    @foreach ($tarefas as $tarefa)
                        @php
                            // Certifique-se de que $tarefa->hora_inicio é um objeto Carbon ou uma string de data válida
                            $horaInicioFormatada = \Carbon\Carbon::parse($tarefa->hora_inicio)->format('Y-m-d');
                        @endphp
                    
                        @if ($horaInicioFormatada == request('dataSelecionada'))
                        
                        <li>{{ $tarefa->titulo }}</li>
                        <span class="descricao">{{ $tarefa->descricao }}</span>
                        @endif
                    @endforeach
                
                </ul>
                
                <form action="{{ route('processarDataSelecionada') }}" class="oculto" method="POST">
                    @csrf
                    <input type="hidden" name="dataSelecionada" id="dataSelecionada" value="{{ $currentDay }}">
                    <button class="btnViewTarefas">Ver tarefas da data selecionada</button>
                </form>

                <a href="{{ route('verTodasTarefas') }}" class="allTask">
                    <span class="posts">Ver todas as tarefas</span>
                </a>
    
            </div><!-- current-events -->

            <hr class="event-line" />
            <div class="create-event">Marcar uma tarefa</div>
            <a href="{{ route('tarefa') }}">
                <div class="add-event"><span class="add">+</span></div>
            </a>
        </div><!-- calendar-left -->

        <div class="calendar-base">
            <div class="year">{{ $currentYear  }}</div><!-- year -->

            <div class="triangle-left"></div><!-- triangle-left -->
            <div class="triangle-right"></div><!-- triangle-right -->

            <div class="months">
                @foreach ($months as $index => $month)
                    <span class="month-hover {{ $month['isCurrent'] ? 'month-color' : '' }}" data-month="{{ $index }}">{{ $month['name'] }}</span>
                @endforeach
            </div><!-- months -->
            <hr class="month-line" />

            <div class="days">
                <div class="day">DOM</div>
                <div class="day">SEG</div>
                <div class="day">TER</div>
                <div class="day">QUA</div>
                <div class="day">QUI</div>
                <div class="day">SEX</div>
                <div class="day">SAB</div>
            </div><!-- days -->

            <div class="num-dates">
                @foreach ($dates as $date)
                    <div class="day {{ $date['isActive'] ?? false ? 'active-date' : '' }}" data-day="{{ $date['day'] }}">{{ $date['day'] }}</div>
                @endforeach
            </div><!-- num-dates -->
        </div><!-- calendar-base -->
    </div><!-- container -->

    <script src="{{ url('assets/js/home.js') }}"></script>
</body>
</html>
