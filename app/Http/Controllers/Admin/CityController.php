<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $cities = City::latest();
            return DataTables::of($cities)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" data-city-id="' . $data->city_id . '" class="fa fa-pencil m-2 btn-link edit-city" role="button"></a><a href="javascript:void(0)"onclick="delCity(' . $data->city_id . ')" class="fa fa-trash m-2"></a>';
                    return $action;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.cites');
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
        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $city = new City();
            $city->name = $request->name;
            $city->save();
            return response()->json([
                'success' => true,
                'message' => 'City Added Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'City Adding Failed',
                // 'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        if(!request()->ajax()){
            return redirect()->route('login');
        }
        try {
            $htmlResponse = view('admin.partials.city.edit-city', ['city' => $city])->render();
            return response()->json([
                'success' => true,
                'htmlResponse' => $htmlResponse,
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while processing your request',
                // 'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        try {
            $city->name = $request->name;
            $city->save();
            return response()->json([
                'success' => true,
                'message' => 'City Updated Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'City Updating Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        try {
            $city->delete();
            return response()->json([
                'success' => true,
                'message' => 'City Removed Succesfuly',
            ], 200);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'City Removing Failed',
                'exception' => $exception->getMessage()
            ], 500);
        }
    }
}
