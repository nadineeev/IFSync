<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disciplina;

class AlunoDisciplina extends Model
{
    use HasFactory;

    protected $table = 'aluno_disciplinas';
    protected $fillable = ['user_id', 'disciplina_id', 'periodo', 'faltas', 'faltas_dia'];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplina_id');
    }

    public function aluno()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
