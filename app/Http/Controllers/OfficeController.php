<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:employee','verified']);
    }
    public function index()
    {
        return view('office.dashboard.main');
    }
}