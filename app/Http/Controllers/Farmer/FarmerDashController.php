<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmerDashController extends Controller
{
    public function index()
    {
        return view("farmer.farmer-index");
    }
}
