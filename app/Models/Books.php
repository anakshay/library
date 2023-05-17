<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Authors;
use App\Models\Reviews;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

   
    public function review()
    {
        return $this->hasMany(Reviews::class);
    }
    
    public function category()
    {
        return  $this->hasMany(Category::class, 'id', 'categories_id');
    }


    public function generes()
    {
        return  $this->hasMany(Genres::class,  'id','genres_id');
    }


   
        public function getDescriptionAttribute($value){
            return  ucfirst($value);
        }
   
}
