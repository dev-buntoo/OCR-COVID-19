<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\VaccinationCenter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class VaccinationCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $centers = User::with(['vaccinationCenter' => function ($query) {
                $query->with('city');
            }])->whereHas("roles", function ($q) {
                $q->where("name", "vaccination-center");
            })->latest()->get();
            return DataTables::of($centers)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" data-center-id="' . $data->vaccinationCenter->vaccination_center_id . '" class="fa fa-pencil m-2 btn-link edit-center" role="button"></a><a href="javascript:void(0)"onclick="delCenter(' . $data->vaccinationCenter->vaccination_center_id . ')" class="fa fa-trash m-2"></a>';
                    return $action;
                })->rawColumns(['action'])
                ->make(true);
        }
        $cities = City::latest()->get();
        return view('admin.pages.vaccination-centers', ['cities' => $cities]);
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
        // return($request);
        $request->validate([
            'name' => 'required|string|max:250',
            'city' => 'required|exists:cities,city_id',
            'address' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'password' => 'required',
        ]);
        try {
            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->assignRole(Role::where('name', 'vaccination-center')->first());
            $center = new VaccinationCenter();
            $center->user_id = $user->user_id;
            $center->name = $request->name;
            $center->address = $request->address;
            $center->city_id = $request->city;
            $center->save();
            return response()->json([
                'success' => true,
                'message' => 'Vaccination Center Added Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Vaccination Center Adding Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function show(VaccinationCenter $vaccinationCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(VaccinationCenter $vaccinationCenter)
    {
        if (!request()->ajax()) {
            return redirect()->route('login');
        }
        try {
            $cities = City::latest()->get();
            $htmlResponse = view('admin.partials.vaccination-center.edit-center', ['vaccinationCenter' => $vaccinationCenter, 'cities' => $cities])->render();
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
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VaccinationCenter $vaccinationCenter)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'city' => 'required|exists:cities,city_id',
            'address' => 'required|string|max:250',
            'email' => 'required|unique:users,email,' . $vaccinationCenter->user_id.',user_id',
        ]);
        try {
            $user = User::findorFail($vaccinationCenter->user->user_id);
            $user->email = $request->email;
            ($request->passowrd) ? $user->password = ($request->passwrod) : '';
            $user->save();
            $vaccinationCenter->name = $request->name;
            $vaccinationCenter->address = $request->address;
            $vaccinationCenter->city_id = $request->city;
            $vaccinationCenter->save();
            return response()->json([
                'success' => true,
                'message' => 'Vaccination Center Updated Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Vaccination Center Updating Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VaccinationCenter  $vaccinationCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(VaccinationCenter $vaccinationCenter)
    {
        try {
            $user = User::findorFail($vaccinationCenter->user->user_id);
            $user->delete();
            $vaccinationCenter->delete();
            return response()->json([
                'success' => true,
                'message' => 'Vaccination Center Removed Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Vaccination Center Removing Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }
}
