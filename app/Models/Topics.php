<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    protected $table = 'topics';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'idTopic';
    protected $fillable = [
        'idTopic',
        'nameTopic',
        'timeStart',
        'timeEnd',
        'typeTopic',
        'idLeader',
        'idResult',
        'idGrade',
        'idLevel',
    ];

    public function leader()
    {
        return $this->belongsTo(TopicLeader::class, 'idLeader');
    }
    public function result()
    {
        return $this->hasOne(TypeResult::class, 'idResult');
    }
    public function instructor()
    {
        return $this->hasOne(Instructor::class, 'idTopic');
    }
    public function grade()
    {
        return $this->belongsTo(AwardGrade::class, 'idGrade');
    }
    public function level()
    {
        return $this->belongsTo(AwardLevel::class, 'idLevel');
    }
    public function document()
    {
        return $this->hasMany(Document::class, 'idTopic');
    }
}
