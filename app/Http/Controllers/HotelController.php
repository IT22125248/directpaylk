<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('hotels.index');
    }

    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));

        
    }

    public function hotellist()
    {
        $hotels = Hotel::all();

        // Pass hotels data to the view
        return view('admins.hotellist', compact('hotels'));
    }

     // Show the form for editing a hotel
     public function edit($id)
     {
         $hotel = Hotel::findOrFail($id);
         return view('admins.edit', compact('hotel'));
     }
 
     // Update the hotel details in the database
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required',
             'description' => 'required',
         ]);
 
         $hotel = Hotel::findOrFail($id);
         $hotel->name = $request->name;
         $hotel->description = $request->description;
 
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('images', 'public');
             $hotel->image = $imagePath;
         }
 
         $hotel->save();
 
         return redirect()->route('admins.hotellist');
     }
 
     // Soft delete the hotel
     public function destroy($id)
     {
         $hotel = Hotel::findOrFail($id);
         $hotel->delete(); // Soft delete
 
         return redirect()->route('admins.hotellist');
     }

     public function restore($id)
     {
         $hotel = Hotel::withTrashed()-> find($id);
         $hotel->restore(); // Soft delete
 
         return redirect()->route('admins.hotellist');
     }

}
