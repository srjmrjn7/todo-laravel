<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToDo;

class DashboardController extends Controller
{
    public function index() {
        $data = array(
            'todos' => ToDo::latest()->paginate(10)
        );
        return view('dashboard.index', $data);
    }
}
