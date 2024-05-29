<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'document';
    protected $fillable = [
        'id',
        'typeDocs',
        'file',
        'idTopic',
    ];

    public function topic()
    {
        return $this->belongsTo(Topics::class, 'idTopic');
    }
}
