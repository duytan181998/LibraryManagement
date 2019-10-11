<?php

namespace App\Http\Controllers;

use App\MuonTraModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDashboard()
    {

        return view('admin.home.dashboard');
    }
}
