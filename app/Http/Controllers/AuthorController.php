<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:authors,email",
            "password" => "required|min:4|confirmed"
        ]);
        $author = new Author();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->save();
        return response()->json([
            "status" => "ok",
            "message" => "created author successfully",
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid email and password",
            ]);
        }
        $tokenData = Auth::user()->createToken("auth-token");
        return response()->json([
            "status" => "ok",
            "message" => "Login successfully",
            "data" => $tokenData
        ]);
    }

    public function profile()
    {
        return response()->json([
            "status" => "ok",
            "message" => "Author found",
            "data" => Auth::user()
        ]);
    }

    public function logout()
    {
        auth()->user()->token()->revoke();
        return response()->json([
            "status" => "ok",
            "message" => "Author logout",
        ]);
    }
}
