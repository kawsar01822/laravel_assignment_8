<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $name = "Donal Trump";
        $age = "75";

        $data = array(
            "id" => $id,
            "name" => $name,
            "age" => $age
        );

        $name = "access_token";
        $value = "123-XYZ";
        $minute = 1;
        $path = "/";
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false;
        $httpOnly = true;

        return response($data,200)->cookie($name,$value,$minute,$path,$domain,$secure,$httpOnly);
    }
}
