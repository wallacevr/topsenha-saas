<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home');
    }

    public function cadastro()
    {
        return view('landing.cadastro');
    }

    public function quemSomos()
    {
        return view('landing.quem-somos');
    }

    public function faq()
    {
        return view('landing.faq');
    }
}
