<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParamedicStaff extends Model
{
    use HasFactory, SoftDeletes;
    protected $primary_id = 'paramedic_staff_id';
    /**
     * Relation with the paramedic staff
     *
     * return relation
     */
    public function paramedicStaff()
    {
        return $this->belongsTo(ParamedicStaff::class, 'user_id', 'user_id');
    }
}
