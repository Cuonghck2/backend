<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'members';
    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey = 'idMember';
    protected $fillable = [
        'idMember',
        'nameMember',
        'taskMember',
        'idLeader'
    ];

    public function topicLeader()
    {
        return $this->belongsTo(TopicLeader::class, 'idLeader', 'idLeader');
    }
}
