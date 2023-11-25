<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class videoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "controller function called without function name in route";
    }
}
