<?php

namespace stix\Http\Controllers;

use stix\Note;
use Illuminate\Http\Request;

use stix\Http\Requests;
use stix\Notebook;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $notes = Note::all();
        $notebooks = Notebook::all();
        return view('pages.dashboard',compact(['notes','notebooks']));
    }
}
