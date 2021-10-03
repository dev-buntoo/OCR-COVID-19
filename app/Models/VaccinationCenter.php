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



    /**
     * reverse relation with user table
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    /**
     * relation with user table
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }
}
