<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller {
    public function loginPage() {
        return view("Login");
    }

    public function onLogin(Request $request) {

        $user = $request->input("user");
        $pass = $request->input("pass");
        $countValue = AdminModel::where("username","=",$user)->where("password","=",$pass)->count();

        if ($countValue) {
            return 1;
        }else {
            return 0;
        }

    }
}
