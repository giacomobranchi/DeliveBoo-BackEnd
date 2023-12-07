<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('dish', 'types')->get();
        return response()->json([
            'success' => true,
            'result' => $users
        ]);
    }

    public function show($slug)
    {

        $user = User::with('dish', 'types')->where('slug', $slug)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'result' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Page not found'
            ]);
        }
    }
}
