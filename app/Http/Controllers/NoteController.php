<?php

namespace stix\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use stix\Note;
use Illuminate\Http\Request;

use stix\Http\Requests;
use stix\Notebook;

class NoteController extends Controller
{
    //
    public function index()
    {
        return view('notes.index')->with(['notes' => Note::all()]);
    }

    public function create($id)
    {
        return view('notes.create')->with(['id' => $id]);
    }

    public function store(Request $request)
    {
        $notebook = Notebook::find($request->input('nbid'));

        $note = new Note();
        $note->title = $request->input('title');
        $note->body = encrypt($request->input('body'));
        $note->encrypted = true;

        $notebook->notes()->save($note);
        return redirect('dashboard');
    }

    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show',compact('note'));
    }

    public function update($id,Request $request)
    {
        $note = Note::find($id);
        $notebook = $note->notebook;
        $note->body = encrypt($request->input('body'));
        $notebook->notes()->save($note);
        return redirect('dashboard');
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->back();
    }

    public function getNotes($id)
    {
        $notebook = Notebook::find($id);
        if($notebook)
        {
            $notes = $notebook->notes()->latest()->get();
            return $notes;
        }
        return response()->json(['message' => 'Sorry!No Notes Exists just yet!']);
    }

    public function test()
    {
        $note = Note::find(6);
        return $note->notebook()->get();
    }
}
