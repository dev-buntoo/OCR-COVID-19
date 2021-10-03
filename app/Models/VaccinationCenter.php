<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaccinationCenter extends Model
{
    use HasFactory, SoftDeletes;
    // protected $id = 'vaccination_center_id';
    protected $primaryKey = 'vaccination_center_id';
}
