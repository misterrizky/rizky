<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmailToUser($request) {

        Mail::to($request)->send(new VerificationMail);
        return "<p> Your E-mail has been sent successfully. </p>";

    }
    public function index()
    {
        $nama = "Wildan Fuady";
        $email = "wildanfuady@gmail.com";
        $kirim = Mail::to($email)->send(new VerificationMail($nama));
    
        if($kirim){
            echo "Email telah dikirim";
        }
     
    }
} 