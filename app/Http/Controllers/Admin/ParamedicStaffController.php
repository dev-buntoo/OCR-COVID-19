<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ParamedicStaff;
use App\Models\User;
use App\Models\VaccinationCenter;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ParamedicStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $staff = User::whereHas("roles", function($q){ $q->where("name", "paramedic"); })->latest()->get();
            return DataTables::of($staff)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" data-city-id="' . $data->city_id . '" class="fa fa-pencil m-2 btn-link edit-city" role="button"></a><a href="javascript:void(0)"onclick="delCity(' . $data->city_id . ')" class="fa fa-trash m-2"></a>';
                    return $action;
                })->rawColumns(['action'])
                ->make(true);
        }
        $vaccinationCenters = VaccinationCenter::latest()->get();
        return view('admin.pages.paramedic-staff', ['vaccinationCenters' => $vaccinationCenters]);
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
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phone' => 'required|digits:11|unique:users,phone',
                'email' => 'required|email',
                'password' => 'required',
                'cnic' => 'required|digits:13|unique:users,cnic',
                'dob' => 'required|date',
                'gender' => 'required|in:1,2,3',
                'center' => 'required|exists:vaccination_centers,vaccination_center_id',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]
        );
        try {
            $user = new User;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->cnic = $request->cnic;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->dob;
            $user->save();
            $paramedic = new ParamedicStaff;
            $paramedic->user_id = $user->user_id;
            $paramedic->name = $request->name;
            $paramedic->vaccination_center_id = $request->center;
            $paramedic->address = $request->address;
            $paramedic->city = $request->city;
            $paramedic->state = $request->state;
            $paramedic->save();
            $user->assignRole(Role::where('name', 'paramedic')->first());
            return response()->json([
                'success' => true,
                'message' => 'Paramadic Staff Added Successfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Paramadic Staff Adding Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function show(ParamedicStaff $paramedicStaff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamedicStaff $paramedicStaff)
    {
        if (!request()->ajax()) {
            return redirect()->route('login');
        }
        try {
            $cities = City::latest()->get();
            $htmlResponse = view('admin.partials.paramedic-staff.edit-staff', ['paramedicStaff' => $paramedicStaff, 'cities' => $cities])->render();
            return response()->json([
                'success' => true,
                'htmlResponse' => $htmlResponse,
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while processing your request',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParamedicStaff $paramedicStaff)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'phone' => 'required|digits:11|unique:users,phone',
                'email' => 'required|email',
                'password' => 'required',
                'cnic' => 'required|digits:13|unique:users,cnic',
                'dob' => 'required|date',
                'gender' => 'required|in:1,2,3',
                'center' => 'required|exists:vaccination_centers,vaccination_center_id',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]
        );
        try {
            $user = User::findorFail($paramedicStaff->user->user_id);
            $user->email = $request->email;
            $user->password = $request->password;
            $user->cnic = $request->cnic;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->dob;
            $user->save();
            $paramedicStaff->user_id = $user->user_id;
            $paramedicStaff->name = $request->name;
            $paramedicStaff->vaccination_center_id = $request->center;
            $paramedicStaff->address = $request->address;
            $paramedicStaff->city = $request->city;
            $paramedicStaff->state = $request->state;
            $paramedicStaff->save();
            return response()->json([
                'success' => true,
                'message' => 'Paramadic Staff Updated Successfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Paramadic Staff Updating Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParamedicStaff  $paramedicStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParamedicStaff $paramedicStaff)
    {
        //
    }
}
