<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $table = 'disciplinas'; // nome da sua tabela no banco

    protected $fillable = [
        'nome_disciplina',
        'total_aulas',
        'max_faltas',
        'aulas_por_dia'
    ];

    // relacionamento com aluno_disciplinas
    public function alunos()
    {
        return $this->hasMany(AlunoDisciplina::class, 'disciplina_id');
    }
}
