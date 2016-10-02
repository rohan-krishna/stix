<?php

namespace stix\Http\Controllers;

use stix\Notebook;
use Illuminate\Http\Request;

use stix\Http\Requests;
use stix\User;
use Auth;

class NotebookController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return Notebook::all();
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $notebook = new Notebook();
        $notebook->title = $request->input('title');
        $notebook->slug = str_slug($notebook->title);

        // Save user with notebook
        $user->notebooks()->save($notebook);

        return $notebook;
    }

    public function show($slug)
    {
        return $notebook = Notebook::where('slug',$slug)->first();
    }

    public function destroy($slug)
    {
        $notebook = Notebook::where('slug',$slug)->delete();
        return response()->json("Notebook successfully deleted!");
    }
    public function getNotebooks()
    {
        return Notebook::latest()->get();
    }

    public function getTest()
    {
        return User::all();
    }
}
