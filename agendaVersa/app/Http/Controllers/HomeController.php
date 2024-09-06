<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function showCalendar(Request $request)
    {
        // Pega o ano e mês da requisição ou usa o ano e mês atuais se não fornecido
        $year = $request->input('year', Carbon::now()->year);
        $currentMonth = $request->input('month', Carbon::now()->month);

        // Gerar dados dos meses
        $months = [];
        foreach (range(1, 12) as $month) {
            $months[] = [
                'name' => Carbon::create()->month($month)->format('M'),
                'isCurrent' => $month == $currentMonth
            ];
        }

        // Gerar dias do mês atual
        $dates = $this->generateDatesForMonth($year, $currentMonth);

        $currentDate = Carbon::now()->format('j');
        $events = ['Day 09 Daily CSS Image']; // Exemplo de eventos

        return view('home', compact('year', 'months', 'dates', 'currentDate', 'events'));
    }

    private function generateDatesForMonth($year, $month)
    {
        $dates = [];
        $startDate = Carbon::create($year, $month, 1);
        $endDate = $startDate->copy()->endOfMonth();
        $currentDate = Carbon::now()->format('j');

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            $dates[] = [
                'day' => $date->day,
                'isActive' => $date->day == $currentDate
            ];
        }

        return $dates;
    }
}
