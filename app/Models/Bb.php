<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Bb extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['title', 'content', 'price']; 
}
