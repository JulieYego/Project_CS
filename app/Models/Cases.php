<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'cases';
    protected $fillable = [
        'suspect_name',
        'case_judge',
        'courtroom',
        'time',
        'activity',
        'outcome',
        'type',
        'photo',
        'case_description',
        'case_notes',
    ];
}


