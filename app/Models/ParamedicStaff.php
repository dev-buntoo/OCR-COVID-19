<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParamedicStaff extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'paramedic_staff_id';
    // protected $id = 'paramedic_staff_id';
    /**
     * Relation with the Vaccination Center
     *
     * return relation
     */
    public function vaccinationCenter()
    {
        return $this->belongsTo(VaccinationCenter::class, 'vaccination_center_id', 'vaccination_center_id');
    }
    /**
     * Relation with the Vaccination Center
     *
     * return relation
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
