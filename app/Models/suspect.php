<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspect extends Model
{
    use HasFactory;
    protected $table = 'suspects';
    protected $fillable = [
        'first_name',
        'last_name',
        'IDnumber',
        'gender',
        'officer',
        'crime',
        'place',
        'photo',
        'present',
        'status',
    ];
    protected $dates = ['present'];
}
