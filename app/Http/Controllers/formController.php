<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class formController extends Controller
{
    public function index(Request $request) {

        $email = $request->input('email');

        if ($request->has('email')) {

            $data = [
                "status" => "success",
                "message" => "Form submitted successfully.",
                "email" => $email
            ];

            return response($data);

        } else {

            $data = [
                "status" => "failed",
                "message" => "Form submission failed."
            ];

            return response()->json($data);
        }

    }

    public function userAgent(Request $request) {

        $userAgent = $request->header('User-Agent');

        return response($userAgent);
    }

    public function fileUpload(Request $request) {
        $file = $request->file('file');
        $fileSize = $file->getSize();
        $fileTempName = $file->getFilename();
        $fileType = $file->getMimeType();
        $fileOriginalName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();

        // upload file to storage
        $file->storeAs('public/uploads', $fileOriginalName);

        // move file to public folder
        $file->move(public_path('uploads'), $fileOriginalName);


        $data = [
            "fileSize" => $fileSize,
            "fileTempName" => $fileTempName,
            "fileType" => $fileType,
            "fileOriginalName" => $fileOriginalName,
            "fileExtension" => $fileExtension
        ];

        return response()->json($data);
    }

    public function requestIp(Request $request) {

        $ip = $request->ip();
        $accept = $request->getAcceptableContentTypes();

        if($request->accepts(['text/html'])){   // you can set this in header
            return true;
        }

        return response()->json($accept);
    }

    public function binary() {

        $file = public_path('uploads/12.jpg');

        return response()->file($file);
    }

    public function download() {

        $file = public_path('uploads/12.jpg');

        return response()->download($file);
    }

    public function sum(Request $request) {

        $num1 = $request->num1;
        $num2 = $request->num2;
        $sum = $num1+$num2;

        Log::info($sum);
        return response($sum);
    }

    public function sessionPut(Request $request) {

        $email = $request->email;
        $request->session()->put('email', $email);
        return true;
    }

    public function sessionGet(Request $request) {

        return $request->session()->get('email', 'default');
    }

    public function sessionPull(Request $request) {

        return $request->session()->pull('email', 'default');
    }

    public function sessionForget(Request $request) {

        $request->session()->forget('email');
        return true;
    }

    public function sessionFlush(Request $request) {

        $request->session()->flush();
        return true;
    }

    public function hi(){
        return "Hi, there...";
    }

    public function testMiddleware(){
        return "Hello from Test Middleware!";
    }

    public function hi1(Request $request){
        return $request->header();
    }

    public function hi2(Request $request){
        return "Hi2, from Controller";
    }


}
