<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
       
        'name',
        
    ];

    

    public function genere(){
        return $this->belongsTo(Books::class);
    }

}
