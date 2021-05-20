<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'issued_by',
        'issued_on',
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
