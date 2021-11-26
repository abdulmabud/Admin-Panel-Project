<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function dashboard(){
        Gate::authorize('app.dashboard');
        return view('app.dashboard');
    }
}
