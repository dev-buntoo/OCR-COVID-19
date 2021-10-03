<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $id = 'user_id';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'cnic',
        'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation with the Admin
     *
     * return relation
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }
    /**
     * Relation with the Admin
     *
     * return relation
     */
    public function citizen()
    {
        return $this->hasOne(Citizen::class, 'user_id', 'user_id');
    }
    /**
     * Relation with the paramedic staff
     *
     * return relation
     */
    public function vaccinationCenter()
    {
        return $this->hasOne(VaccinationCenter::class, 'user_id', 'user_id');
    }

    /**
     * Relation with the paramedic staff
     *
     * return relation
     */
    public function paramedicStaff()
    {
        return $this->hasOne(ParamedicStaff::class, 'user_id', 'user_id');
    }
}
