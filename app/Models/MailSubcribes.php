<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSubcribes extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'mail_subcribes';
}
