<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AlunoDisciplina;

class FrequenciaController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();

        // Carrega disciplinas do aluno logado
        $disciplinas = AlunoDisciplina::with('disciplina')
            ->where('user_id', $usuarioId)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'nome_disciplina' => $item->disciplina->nome_disciplina ?? 'Sem nome',
                    'total_aulas'     => (int)($item->disciplina->total_aulas ?? 0),
                    'max_faltas'      => (int)($item->disciplina->max_faltas ?? 0), // máx em aulas
                    'aulas_por_dia'   => (int)($item->disciplina->aulas_por_dia ?? 1), // vem do banco!
                    'faltas_dia'      => (int)($item->faltas_dia ?? 0),
                ];
            });

        $periodo = $disciplinas->first()->periodo ?? '2025.2';

        return view('frequencia', compact('disciplinas', 'periodo'));
    }


}
