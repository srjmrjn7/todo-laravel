<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $data = array(
            'todos' => $request->user()->todos()->paginate(10)
        );
        return view('dashboard.index', $data);
    }
}
