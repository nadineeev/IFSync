<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Disciplina;
use App\Models\AlunoDisciplina;

class DisciplinaController extends Controller
{
    // Exibe tela de cadastro
    public function cadastrar()
    {
        $periodos = DB::table('periodos')->get();
        $disciplinas = DB::table('disciplinas')
            ->select('id', 'nome_disciplina', 'curso_id', 'total_aulas')
            ->get();

        return view('cadastroDisciplinas', compact('periodos', 'disciplinas'));
    }

    // Salva disciplinas selecionadas
    public function salvar(Request $request)
    {
        $user_id = Auth::id();
        $disciplinasSelecionadas = $request->input('disciplinas', []);
        $periodoSelecionado = $request->input('periodo');

        // Evita duplicação — remove disciplinas antigas antes de salvar novas
        DB::table('aluno_disciplinas')->where('user_id', $user_id)->delete();

        foreach ($disciplinasSelecionadas as $disciplina_id) {
            // Insere vínculo aluno-disciplina
            DB::table('aluno_disciplinas')->insert([
                'user_id' => $user_id,
                'disciplina_id' => $disciplina_id,
                'periodo' => $periodoSelecionado,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Cria registro de frequência inicial, se ainda não existir
            $existe = DB::table('frequencias')
                ->where('user_id', $user_id)
                ->where('disciplina_id', $disciplina_id)
                ->exists();

            if (!$existe) {
                DB::table('frequencias')->insert([
                    'user_id' => $user_id,
                    'disciplina_id' => $disciplina_id,
                    'faltas_realizadas' => 0,
                    'dias_restantes' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('menu')->with('success', 'Disciplinas cadastradas com sucesso!');
    }
}
