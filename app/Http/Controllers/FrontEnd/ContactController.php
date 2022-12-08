<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use File;
use Http;

class ContactController extends Controller
{

    public function index() {
        $response = Http::get('localhost:8000/api/contacts/');
        $data['contacts'] = json_decode($response->body());
        return view('frontend.index', $data);
    }

    public function create() {
        return view('frontend.add');
    }

    public function store(Request $request) {
        // if ($request->hasFile('image')) {
        //     $image = $request->image;

        //     $response = Http::attach(
        //         'attachment', file_get_contents($image)
        //     )->post('localhost:8000/api/contacts/', $request->all());

        // } else {
        //     $response = Http::post('localhost:8000/api/contacts/', $request->all());
        // }

        $this->validateContact($request);
        $response = Http::post('localhost:8000/api/contacts/', $request->all());
        return redirect()->route('getContact.index');
    }

    public function show($id) {
    
    }

    public function edit($id) {
        $response = Http::get('localhost:8000/api/contacts/'.$id.'/edit');
        $data['contact'] = json_decode($response->body());
        return view('frontend.edit', $data);
    }

    public function update(Request $request, $id) {
        $this->validateContact($request);
        $response = Http::post('localhost:8000/api/contacts/'.$id, $request->all());
        return redirect()->route('getContact.index');

    }

    public function validateContact($data) {
        $data->validate([
            'fname'=>'required | max:200',
            'lname'=>'required | max:200',
            'email'=>'required | max:200',
            'phone'=>'required | digits:10',
        ]);
    }

    public function saveContact($contact, $data) {
        
    }

    public function destroy($id) {
        $response = Http::delete('localhost:8000/api/contacts/'.$id);
        return redirect()->route('getContact.index');
    }

    public function sort(Request $request) {
        $response = Http::get('localhost:8000/api/sort-table/'.$request->sortBy);
        $data['contacts'] = json_decode($response->body());
        return view('frontend.index', $data);
    }

    public function search(Request $request) {
        $response = Http::get('localhost:8000/api/search-table/'.$request->search);
        $data['contacts'] = json_decode($response->body());
        return view('frontend.index', $data);
    }
}
