<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;
class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'name',
        'rating',
        'comment',
        'books_id'
    ];
    public function Review()
    {
        return $this->hasMany(Books::class ,'id','books_id');
    }
    
}
