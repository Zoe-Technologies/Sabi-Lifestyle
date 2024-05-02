<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard() {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }

    public function userDashboard() {
        $user = auth()->user();
        return view('users.dashboard', compact('user'));
    }
}
