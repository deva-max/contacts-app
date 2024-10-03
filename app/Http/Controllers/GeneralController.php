<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(){
        
        return view('welcome');
    }

    public function get_contacts(){
        return response()->json(Contacts::all());
    }

    public function edit($id)
    {
        $user = Contacts::find($id);

        if ($user) {
            return response()->json($user); // Return user data as JSON
        }

        return response()->json(['error' => 'User not found.'], 404);
    }

    public function importUsers(Request $request)
    {
        $users = $request->json()->all();

        foreach ($users as $user) {
            // Validate and save each user
            Contacts::create([
                'name' => $user['name'],
                'last_name' => $user['last_name'],
                'phone' => $user['phone'],
            ]);
        }

        return response()->json(['message' => 'Users imported successfully'], 200);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Find the user by ID
        $user = Contacts::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Update the user with the validated data
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->phone = $request->input('phone');
        $user->save(); // Save the changes to the database

        // Return a success response
        return response()->json(['success' => 'User updated successfully.']);
    }

    public function destroy($id)
    {
        $user = Contacts::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }

        return response()->json(['error' => 'User not found.'], 404);
    }
}
