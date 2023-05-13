<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authors;
use App\Models\Reviews;
class Books extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
       
        'name',
        'descriptions'
    ];

    public function relate()
    {
        return $this->belongsToMany(Authors::class);
    }


    // public function rview()
    // {
    //     return $this->belongsToMany(Reviews::class, 'books_reviews','book_id','review_id');
    // }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function Reviews()
    {
        return $this->belongsTo(Reviews::class);
    }
    public function category()
    {
        return  $this->hasMany(Category::class, 'id', 'categories_id');
    }


    public function generes()
    {
        return  $this->hasMany(Genres::class,  'id','genres_id');
    }

    
   
}
