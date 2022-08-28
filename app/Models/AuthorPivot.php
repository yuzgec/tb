<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorPivot extends Model
{
    use HasFactory;

    protected $table = 'author_pivots';
    protected $guarded = [];
    public $timestamps = false;

}
