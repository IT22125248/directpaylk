<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;


class AdminController extends Controller
{
    
    public function dashboard()
    {
       // Get the count of hotels from the database
       $hotelsCount = Hotel::count();
        
       // Pass the count to the view
       return view('admins.dashboard', compact('hotelsCount'));
    }

    
}
