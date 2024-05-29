<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';

    protected $fillable = [
        'idUnit',
        'nameUnit',
    ];

    public function topicleader()
    {
        return $this->hasMany(TopicLeader::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
