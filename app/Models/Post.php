<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    // En caso te den bd y no tiene los campos created_at ni update_at desabilitalos con esto
    public $timestamps = false;
}
