<?php

namespace App\Http\Controllers\VaccinationCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('vaccination-center.home');
    }
}
