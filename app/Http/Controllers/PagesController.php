<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * 
     */
    public function first_page($name)
    {
        return view('first_page', compact('name'));
    }
}
