<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        /* $users = User::all();
        return response()->json($users);   */     
        return "option has been disabled!!!";
    }


    public function show($id)
    {
        /* $user = User::findOrFail($id);        
        return response()->json($user); */
        return "option has been disabled!!!";
    }
    

    public function store(Request $request)
    {        
        /* $validatedData = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        
        $user = User::create($validatedData);        

        return response()->json(['message' => 'User created successfully'], 201);  */
        return "option has been disabled!!!";
    }

    
    public function update(Request $request, $id)
    {
        /* $request->validate([
            'name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users'                                    
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully'], 200); */
        return "option has been disabled!!!";
    }

    
    public function destroy($id)
    {
        /* $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User successfully deleted'], 200); */
        return "option has been disabled!!!";
    }
}
