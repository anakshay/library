<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorsBooks extends Model
{
    use HasFactory;
    protected $primarykey = 'id';

    protected $fillable = [
       
        'author_id',
        'book_id'
        
    ];
}
