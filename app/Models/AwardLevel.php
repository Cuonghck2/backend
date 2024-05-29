<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardLevel extends Model
{
    use HasFactory;

    protected $table = 'award_level';
    protected $fillable = [
        'idLevel',
        'nameLevel',
    ];

    public function topics()
    {
        return $this->hasMany(Topics::class, 'idLevel');
    }
}
