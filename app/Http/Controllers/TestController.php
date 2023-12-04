<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function envoiMail()
    {
        
        Mail::to('user@test.com')->send(new TestMail());
        
    }
}
    