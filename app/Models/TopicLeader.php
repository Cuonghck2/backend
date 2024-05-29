<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicLeader extends Model
{
    use HasFactory;
    protected $table = 'topic_leader';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'idLeader';
    protected $fillable = ['idLeader', 'nameLeader', 'idUnit'];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'idUnit', 'idUnit');
    }
    public function topic()
    {
        return $this->hasMany(Topics::class, 'idLeader', 'idLeader');
    }
    public function member()
    {
        return $this->hasMany(Members::class, 'idLeader', 'idLeader');
    }
}
