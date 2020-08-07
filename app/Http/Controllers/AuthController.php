<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index(){
        return [" Nis " => "3103118075",
        " Nama " => "Ika Puji Rahayu",
        " Gender " => "Perempuan", 
        " Phone " => "087848786981",
        " Kelas " => " XII RPL 3 ", 
        ];
    }
}
