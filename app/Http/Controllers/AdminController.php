<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $user = auth()->user();
        return view('admin.dashboard', compact('user'));
    }
}
