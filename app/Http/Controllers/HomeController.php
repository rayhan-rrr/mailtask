<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IncomingMail;

class HomeController extends Controller
{
    /**
     * Displays Homepage
     *
     * @return view
     */
    public function index()
    {
        //get all mails
        $mails = IncomingMail::where('active', 1)->orderBy('id', 'desc')->get();
        return view('pages.homepage', compact('mails'));
    }

}
