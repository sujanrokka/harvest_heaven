<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProcessController extends Controller
{
    public function farmerRegistration(Request $req) {
        // print_r($req);
        $b = $req->validate([
            'name' => 'required|max:255|regex:/^[A-Za-z]+$/|unique:users',
            'phone' => 'required|regex:/^(\+977)?[0-9]{10}$/',
            'address' => 'required',
            'bank' => 'required',
            'account' => 'required|regex:/^[0-9]+$/|max:20|min:9',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'email' => 'required|email|max:255|unique:users',
        ]);
        $b["type"] = 0;

        $b["password"] = bcrypt($b["password"]);

         $x = User::create($b);

        

        return redirect(
            "/"
        );
    }
    public function buyerRegistration(Request $req) {
        // print_r($req);
        $b = $req->validate([
            'name' => 'required|max:255|regex:/^[A-Za-z]+$/|unique:users',
            'phone' => 'required|regex:/^(\+977)?[0-9]{10}$/',
            'address' => 'required',
            "password" => 'required|min:6|max:20',
            'confirm-password' => 'required|same:password',
            'email' => 'required |email|max:255|unique:users',
        ]);
        $b["type"] = 1;
        $b["password"] = bcrypt($b["password"]);
        
         $x = User::create($b);

        

        return redirect(
            "/"
        );
    }

    public function buyerLogin(Request $req)  {
        // buyer lai login garaune
        $b = $req->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($b)) {
            $req->session()->regenerate();
            return redirect("/dashboard");

        } else {
            return "Can not login";
        }
    }

    public function farmerLogin(Request $req)  {
             // buyer lai login garaune
             $b = $req->validate([
                'name' => ['required', "min:2", "max:10"],
                'password' => 'required',
            ]);
    
            if(auth()->attempt($b)) {
                $req->session()->regenerate();
                return redirect("/dashboard");
    
            } else {
                return "Can not login";
    
            }
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}

