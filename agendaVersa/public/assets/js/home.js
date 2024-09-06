document.addEventListener('DOMContentLoaded', function() {
    const numDates = document.querySelector('.num-dates');
    const months = document.querySelectorAll('.month-hover');
    const leftNumDate = document.querySelector('.num-date');
    const yearDisplay = document.querySelector('.year');
    const triangleLeft = document.querySelector('.triangle-left');
    const triangleRight = document.querySelector('.triangle-right');
    let currentYear = parseInt(yearDisplay.textContent, 10);
    let currentMonth = [...months].findIndex(el => el.classList.contains('month-color'));
    
    let selectedDayElement = document.querySelector('.selected-day');

    function generateCalendarDays(year, month) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();
        numDates.innerHTML = ''; // Limpa dias anteriores

        // Adiciona espaços em branco para o início do mês
        for (let i = 0; i < firstDay; i++) {
            numDates.innerHTML += '<div class="day empty-day"></div>';
        }

        // Adiciona os dias do mês
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('day');
            dayElement.setAttribute('data-day', day);
            dayElement.textContent = day;

            // Marca o dia atual como selecionado, se corresponder ao dia atual e ao mês atual
            if (day === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) {
                dayElement.classList.add('selected-day');
                selectedDayElement = dayElement;
            }

            numDates.appendChild(dayElement);
        }

        if (selectedDayElement) {
            generateDayLeft(selectedDayElement.getAttribute('data-day'));
        }
    }

    function generateDayLeft(day) {
        const today = day ? new Date(currentYear, currentMonth, day) : new Date();
        const dayOfMonth = today.getDate();
        const formattedDate = dayOfMonth < 10 ? `0${dayOfMonth}` : `${dayOfMonth}`;
        leftNumDate.textContent = formattedDate;
    }

    function handleMonthClick(event) {
        const monthIndex = [...months].indexOf(event.target);
        if (monthIndex !== -1) {
            currentMonth = monthIndex;
            generateCalendarDays(currentYear, currentMonth);
            updateMonthHighlight();
        }
    }

    function handleDayClick(event) {
        const day = event.target.getAttribute('data-day');
        if (day) {
            if (selectedDayElement) {
                selectedDayElement.classList.remove('selected-day');
            }
            event.target.classList.add('selected-day');
            selectedDayElement = event.target;
            generateDayLeft(day);
        }
    }

    function handleYearChange(direction) {
        currentYear += direction;
        yearDisplay.textContent = currentYear; // Atualiza a exibição do ano
        generateCalendarDays(currentYear, currentMonth);
    }

    function updateMonthHighlight() {
        months.forEach((monthEl, index) => {
            if (index === currentMonth) {
                monthEl.classList.add('month-color');
            } else {
                monthEl.classList.remove('month-color');
            }
        });
    }

    // Inicializa o calendário com o mês e ano atuais
    generateCalendarDays(currentYear, currentMonth);
    updateMonthHighlight(); // Atualiza a cor do mês atual

    // Adiciona event listeners
    months.forEach(monthEl => monthEl.addEventListener('click', handleMonthClick));
    numDates.addEventListener('click', handleDayClick);
    triangleLeft.addEventListener('click', () => handleYearChange(-1));
    triangleRight.addEventListener('click', () => handleYearChange(1));
});
