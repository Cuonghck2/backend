<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    use HasFactory;

    protected $table = 'awards';
    protected $fillable = [
        'idAwards',
        'idTopic',
        'idGrade',
        'idLevel',
    ];

    public function topic()
    {
        return $this->belongsTo(Topics::class, 'idTopic', 'idTopic');
    }

    public function grade()
    {
        return $this->hasMany(AwardGrade::class, 'idGrade', 'idGrade');
    }

    public function level()
    {
        return $this->hasMany(AwardLevel::class, 'idLevel', 'idLevel');
    }
}
