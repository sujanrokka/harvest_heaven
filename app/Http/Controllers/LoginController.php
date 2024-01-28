<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function farmerLogin() {
        return view("farmerlogin");
    }

    public function farmerRegistration() {
        return view("farmerRegistration");
    }
        public function buyerlogin() {
            return view("buyerlogin");
        }
        public function buyerRegistration() {
            return view("buyerRegistration");
        }
        
}

