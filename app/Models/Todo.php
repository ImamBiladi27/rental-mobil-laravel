<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'order';
    public $fillable = ['name', 'name_mobil', 'is_done'];
}
