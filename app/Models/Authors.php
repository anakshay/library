<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;
class Authors extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
       
        'name',
        
    ];

    public function authered() {
        return $this->belongsToMany(Books::class);
    }
}
