<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowbiteTestController extends Controller
{
    public function index()
    {
        return view('flowbite-test');
    }
}