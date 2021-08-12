<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyNumber extends Model
{
    use HasFactory, SoftDeletes;
    protected $id = 'family_number_id';
    protected $primaryKey = 'family_number_id';
}
