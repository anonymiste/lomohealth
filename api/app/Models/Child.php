<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'qr_code', 'name', 'birth_date', 'gender', 'mother_name',
        'mother_phone', 'region', 'health_center', 'language', 'photo'
    ];

    protected $casts = ['birth_date' => 'date'];

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}