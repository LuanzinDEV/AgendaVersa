<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/home.css') }}">
    <title>Calendário Dinâmico</title>
</head>
<body>
    <div class="container">
        <div class="calendar-left">
            <div class="hamburger">
                <div class="burger-line"></div><!-- burger-line -->
                <div class="burger-line"></div><!-- burger-line -->
                <div class="burger-line"></div><!-- burger-line -->
            </div><!-- hamburger -->

            <div class="num-date">{{ $currentDate }}</div><!-- num-date -->
            <div class="day">{{ \Carbon\Carbon::now()->format('l') }}</div><!-- day -->
            <div class="current-events">Current Events
                <br/>
                <ul>
                    @foreach ($events as $event)
                        <li>{{ $event }}</li>
                    @endforeach
                </ul>
                <span class="posts">See post events</span>
            </div><!-- current-events -->

            <div class="create-event">Create an Event</div><!-- create-event -->
            <hr class="event-line" />
            <div class="add-event"><span class="add">+</span></div><!-- add-event -->
        </div><!-- calendar-left -->
        
        <div class="calendar-base">
            <div class="year">{{ $year }}</div><!-- year -->

            <div class="triangle-left"></div><!-- triangle-left -->
            <div class="triangle-right"></div><!-- triangle-right -->

            <div class="months">
                @foreach ($months as $month)
                    <span class="month-hover" data-month="{{ $loop->index }}">{{ $month['name'] }}</span>
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
                    <div class="day {{ $date['isActive'] ? 'active-date selected-day' : '' }}" data-day="{{ $date['day'] }}">{{ $date['day'] }}</div>
                @endforeach
            </div><!-- num-dates -->

            <div class="event-indicator"></div><!-- event-indicator -->
            <div class="active-day"></div><!-- active-day -->
            <div class="event-indicator two"></div><!-- event-indicator -->
        </div><!-- calendar-base -->
    </div><!-- container -->

    <script src="{{ url('assets/js/home.js') }}"></script>
</body>
</html>
