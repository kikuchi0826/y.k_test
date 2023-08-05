<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function list()
    {
        return view('schedule.list');
    }
}
