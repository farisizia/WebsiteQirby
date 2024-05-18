<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $property = Property::count();
        
        return view('components.pages.home', compact('property'));
    }
}
