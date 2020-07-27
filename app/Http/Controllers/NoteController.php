<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;

class NoteController extends Controller
{
    private $array = ['error' => '', 'result'=> []];

    public function all() {
        $this->array['result'] = Note::all('id', 'title');
        return $this->array;
    }

    public function one($id) {
        $note = Note::find($id);

        if ($note) {
            $this->array['result'] = $note;
        } else {
            $this->array['error'] = 'Anotação não encontrada';
        }
        
        return $this->array;
    }

    public function new(Request $request) {
        $title = $request->input('title');
        $body = $request->input('body');

        if ($title && $body) {
            $note = new Note();
            $note->title = $title;
            $note->body = $body;
            $note->save();

            $this->array['result'] = [
                'id' => $note->id,
                'title' => $title,
                'body' => $body
            ];
        } else {
            $this->array['error'] = 'Campos não enviados';
        }

        return $this->array;
    }

    public function edit($id, Request $request) {
        $title = $request->input('title');
        $body = $request->input('body');

        if ($id && $title && $body) {
            $note = Note::find($id);

            if ($note) {
                $note->title = $title;
                $note->body = $body;
                $note->save();

                $this->array['result'] = [
                    'id' => $note->id,
                    'title' => $title,
                    'body' => $body
                ];
            } else {
                $this->array['error'] = 'Anotação não encontrada';
            }
        } else {
            $this->array['error'] = 'Campos não enviados';
        }

        return $this->array;
    }

    public function delete($id) {
        $note = Note::find($id);

        if ($note) {
            $note->delete();
        } else {
            $this->array['error'] = 'Anotação Não encontrada';
        }

        return $this->array;
    }
}
