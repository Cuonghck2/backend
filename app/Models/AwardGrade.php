<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardGrade extends Model
{
    use HasFactory;

    protected $table = 'award_grade';
    protected $fillable = [
        'idGrade',
        'nameGrade',
    ];

    public function topics()
    {
        return $this->hasMany(Topics::class, 'idGrade');
    }
}
