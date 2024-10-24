<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shape;  // Import the Shape model
use Validator;


class ShapeController extends Controller
{
    // Method to display the login view
    public function login(){
        return view("login");
    }

    // Method to display the create form view
    public function create(){
        return view("create");  // Matches the name of view file
    }

    public function user(){
        return view("user");  // Matches the name of view file
    }

    public function admin()
{
    // Fetch all shapes from the database
    $shapes = Shape::all();

    // Pass the shapes data to the 'admin' view
    return view('admin', ['shapes' => $shapes]);
}


 public function edit($id)
{
    $shape = Shape::findOrFail($id); // Find the shape by ID or throw a 404

    return view('edit', compact('shape')); // Pass the shape data to the view
}
public function update(Request $request, $id)
{
    // Validate the input fields
    $validated = $request->validate([
        'name' => 'required|alpha', // Ensure the name contains only alphabetic characters
        'shape' => 'required',
        'color' => 'required',
    ]);

    // Find the shape by its ID
    $shape = Shape::findOrFail($id);
    
    // Update the shape fields with the new input values
    $shape->name = $validated['name'];
    $shape->shape = $validated['shape'];
    $shape->color = $validated['color'];
    
    // Save the updated shape back to the database
    if ($shape->save()) {
        // If saved successfully, redirect back to the form with a success message
        return redirect()->route('edit', $shape->id)
            ->with('success', 'Shape updated successfully!');
    } else {
        // If save fails, redirect back to the form with an error message
        return redirect()->route('edit', $shape->id)
            ->with('error', 'Failed to update shape');
    }
}

  
    // Method to store new shapes
    public function store(Request $request)
{
    // Apply validation rules first
    $request->validate([
        'name' => 'required|alpha', // Ensure the name only contains alphabetic characters
        'shape' => 'required',
        'color' => 'required',
    ]);

    // If validation passes, create and save the new Shape
    $shape = new Shape();
    $shape->name = $request->input('name');
    $shape->shape = $request->input('shape');
    $shape->color = $request->input('color');
    $shape->timestamp = now(); // Add current timestamp

    if ($shape->save()) {
        // Redirect back with success message if shape is saved successfully
        return redirect()->route('create') // Redirect back to the create form
            ->with('success', 'Shape created successfully!');
    } else {
        // Redirect back with error message if saving fails
        return redirect()->route('create')
            ->with('error', 'Failed to create shape');
    }
}


public function index()
{
    // Fetch all records from the 'shapes' table
    $shapes = Shape::all();

    // Return the user view with shapes
    return view('user', ['shapes' => $shapes]);
}

public function destroy($id)
{
    // Find the shape by ID
    $shape = Shape::findOrFail($id);
    
    // Delete the shape from the database
    if ($shape->delete()) {
        // Redirect back to the admin page with a success message
        return redirect()->route('admin')->with('success', 'Shape deleted successfully!');
    } else {
        // If the deletion fails, return an error message
        return redirect()->route('admin')->with('error', 'Failed to delete shape!');
    }
}


    





}

