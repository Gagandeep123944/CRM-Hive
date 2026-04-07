<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function add_packages(Request $request){


         $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload'), $imageName);
        }

        Package::create([
            'package_name' => $request->package_name,
            'package_duration' => $request->package_duration,
            'package_cost' => $request->package_cost,
            'package_covered' => $request->package_covered,
            'package_description' => $request->package_description,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'plane_type' => $request->plane_type,
            'couple_price' => $request->couple_price,
            'image' => $imageName
        ]); 

        return back()->with('success', 'Package added successfully!');

 
    }


    public function get_packages(){
        $packages = Package::all();

        return view('admin.index', compact('packages')); 
    }
}
