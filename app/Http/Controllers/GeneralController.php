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
