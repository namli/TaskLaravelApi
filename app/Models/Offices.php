<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'address'];
    protected $hidden = ['created_at', 'updated_at'];
}
