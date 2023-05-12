<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\books;
class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'name',
        'rating',
        'comment',
        'books_id'
    ];
    public function books()
    {
        return $this->hasMany(Books::class);
    }
    
}
