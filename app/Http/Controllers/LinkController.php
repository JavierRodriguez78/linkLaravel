<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    public function index()
    {
        $links = \App\link::all();
        return view('welcome')->withLinks($links);
    }
}
