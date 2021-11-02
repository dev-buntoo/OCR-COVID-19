<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citizen extends Model
{
    use HasFactory;

    protected $primaryKey = 'citizen_id';

    // relation with citizen
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class, 'citizen_id', 'citizen_id');
    }
    public function familyNumber()
    {
        return $this->hasOne(FamilyNumber::class, 'family_number_id', 'family_number_id');
    }
}
