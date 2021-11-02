<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\User;
use App\Services\GenerateFamilyNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $centers = User::with(['citizen'])->whereHas("roles", function ($q) {
                $q->where("name", "citizen");
            })->latest()->get();
            return DataTables::of($centers)
                ->addColumn('family_number', function ($data) {
                    return $data->citizen->familyNumber->family_number;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.citizen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
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
        ])->validate();
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
        return response()->json([
            "success" => true,
            'message' => "Citizen Added Successfuly",
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
