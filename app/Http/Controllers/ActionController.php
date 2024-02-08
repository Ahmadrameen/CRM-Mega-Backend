<?php

namespace App\Http\Controllers;

use App\Models\Action;

class ActionController extends Controller
{
    public function index()
    {
        return response()->json(Action::all());
    }
}
