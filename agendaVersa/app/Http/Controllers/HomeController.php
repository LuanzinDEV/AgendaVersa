<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\TarefasModel;

class HomeController extends Controller
{
    public function showCalendar(Request $request)
    {
        // Obtém o mês e ano atual ou usa os passados via request
        $currentMonth = $request->input('month', Carbon::now()->format('m'));
        $currentYear = $request->input('year', Carbon::now()->format('Y'));

        // Cria uma instância Carbon para o primeiro dia do mês
        $startOfMonth = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01");

        // Calcula o último dia do mês
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // Obtém todas as datas do mês
        $dates = $this->getDates($startOfMonth, $endOfMonth);

        // Obtém as tarefas para o usuário logado
        $tarefas = TarefasModel::where('usuario_id', Auth::id())
            ->whereBetween('hora_inicio', [$startOfMonth, $endOfMonth])
            ->get();

        // Define a data atual
        $currentDayFormatted = $request->input('dataSelecionada', Carbon::now()->format('Y-m-d'));

        return view('home', [
            'dates' => $dates,
            'tarefas' => $tarefas,
            'currentDay' => $currentDayFormatted,
            'currentDayFormatted' => $currentDayFormatted,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear, // Corrigido aqui
            'months' => $this->getMonths($currentMonth),
            'nome' => Auth::user()->nome,
            'sobrenome' => Auth::user()->sobrenome,
        ]);
    }

    public function processarDataSelecionada(Request $request)
    {
        $dataSelecionada = $request->input('dataSelecionada');

        return redirect()->route('home', ['dataSelecionada' => $dataSelecionada]);
    }

    private function getDates($startOfMonth, $endOfMonth)
    {
        $dates = [];

        // Adiciona dias antes do primeiro dia do mês para começar a exibição do calendário
        $startDate = $startOfMonth->copy()->startOfMonth()->startOfWeek();
        $endDate = $endOfMonth->copy()->endOfMonth()->endOfWeek();

        while ($startDate->lte($endDate)) {
            $dates[] = [
                'day' => $startDate->day,
                'isActive' => $startDate->between($startOfMonth, $endOfMonth)
            ];
            $startDate->addDay();
        }

        return $dates;
    }

    private function getMonths($currentMonth)
    {
        $months = [
            ['name' => 'Jan', 'value' => '01'],
            ['name' => 'Fev', 'value' => '02'],
            ['name' => 'Mar', 'value' => '03'],
            ['name' => 'Abr', 'value' => '04'],
            ['name' => 'Mai', 'value' => '05'],
            ['name' => 'Jun', 'value' => '06'],
            ['name' => 'Jul', 'value' => '07'],
            ['name' => 'Ago', 'value' => '08'],
            ['name' => 'Set', 'value' => '09'],
            ['name' => 'Out', 'value' => '10'],
            ['name' => 'Nov', 'value' => '11'],
            ['name' => 'Dez', 'value' => '12']
        ];

        return array_map(function($month) use ($currentMonth) {
            $month['isCurrent'] = $month['value'] === $currentMonth;
            return $month;
        }, $months);
    }

    public function tarefaPage(){
        return view('tarefa');
    }
}
