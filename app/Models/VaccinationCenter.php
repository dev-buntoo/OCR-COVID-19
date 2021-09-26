<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationCenter extends Model
{
    use HasFactory;
    protected $id = 'vaccination_center_id';
    protected $primaryKey = 'vaccinaton_center_id';
}
