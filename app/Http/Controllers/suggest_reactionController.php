<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suggest_reaction;

class suggest_reactionController extends Controller
{
    public function calendar()
    {
        return view('calendar');
    }

    public function list()
    {
        return view('suggest_reaction.list');
    }
}
