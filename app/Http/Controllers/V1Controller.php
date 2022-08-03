<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class V1Controller extends Controller
{
    public function index()
    {
        return response([
            'status' => true,
            'message' => 'Module V1'
        ]);
    }

    
}
