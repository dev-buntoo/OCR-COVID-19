<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\GenerateFamilyNumber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif (Auth::user()->hasRole('citizen')) {
            return redirect()->route('citizen.home');
        } elseif (Auth::user()->hasRole('paramedic')) {
            return redirect()->route('paramedic.home');
        } elseif (Auth::user()->hasRole('vaccination-center')) {
            return redirect()->route('vaccinaiton_center.home');
        }
        Auth::logout();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'numeric', 'digits:11'],
            'cnic' => ['required', 'numeric', 'digits:13', 'unique:users'],
            'date_of_birth' => ['required', 'date_format:Y-m-d', 'before_or_equal:today'],
            'gender' => ['required', 'in:1,2'],
            'marital_status' => ['required', 'in:1,2'],
            'guardian_cnic' => ['nullable', 'exist:user,cnic'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->email = $data['email'];
        $user->cnic = $data['cnic'];
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->password = Hash::make($data['password']);
        // $user->role_id = 4;
        $user->save();
        $citizen = new Citizen();
        $citizen->user_id = $user->user_id;
        $citizen->name = $data['name'];
        $citizen->marital_status = $data['marital_status'];
        $citizen->guardian_cnic = $data['guardian_cnic'];
        $citizen->address = $data['address'];
        $citizen->city = $data['city'];
        $citizen->state = $data['state'];
        if ($data['gender'] == 1 && $data['marital_status'] == 1 || $data['gender'] == 2 && $data['marital_status'] == 1 || $data['gender'] == 2 && $data['marital_status'] == 2) {
            $citizen->family_number_id = User::where('cnic', $data['guardian_cnic'])->first()->citizen->family_number_id;
        } else {
            $familyNumber = new GenerateFamilyNumber();
            $citizen->family_number_id = $familyNumber->generateFamilyNumber()->family_number_id;
        }
        $citizen->added_by = 3;
        $citizen->save();
        $user->assignRole(Role::where('name', 'citizen')->first());
        return $user;
    }
}
