<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function TermsPage()
    {
        return view("Terms");
    }
}
