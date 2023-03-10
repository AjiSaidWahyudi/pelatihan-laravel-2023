<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    //protected $fillable = ['title', 'author', 'location', 'year', 'publisher'];
    protected $guarded = [];
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
