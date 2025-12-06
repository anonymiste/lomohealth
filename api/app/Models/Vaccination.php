<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    protected $fillable = ['child_id', 'vaccine_name', 'dose', 'date_given', 'next_due_date'];

    protected $casts = ['date_given' => 'date', 'next_due_date' => 'date'];
}