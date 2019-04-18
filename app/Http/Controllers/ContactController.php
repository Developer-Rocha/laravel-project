<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class ContactController extends Controller
{
    public function index(){

        //$clients = Clients::all();

        return view('contact');
    }
    
}

