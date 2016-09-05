<?php

namespace stix\Http\Controllers;

use stix\Notebook;
use Illuminate\Http\Request;

use stix\Http\Requests;

class NotebookController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('notebooks.index')->with(['notebooks' => Notebook::all()]);
    }

    public function store(Request $request)
    {
        Notebook::create(['title' => $request->input('title')]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $notebook = Notebook::find($id);
        $notebook->delete();
        return redirect()->back();
    }
    public function getNotebooks()
    {
        return Notebook::latest()->get();
    }
}
