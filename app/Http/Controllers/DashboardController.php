<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $data = array(
            'todos' => $request->user()->role === 'admin' ? ToDo::latest()->paginate(10) : $request->user()->todos()->latest()->paginate(10)
        );
        return view('dashboard.index', $data);
    }
}
