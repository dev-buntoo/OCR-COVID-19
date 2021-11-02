<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinatedPerson extends Model
{
    use HasFactory;
    protected $primaryKey = 'vaccinated_people_id';

    // relations
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id', 'citizen_id');
    }
}
