<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name','first_name','gender','email','postcode','address','billname','content']);
        $contact['fullname'] = $request->input('last_name') . ' ' . $request->input('first_name');

        return view('confirm', compact('contact'));
    }


    public function store(ContactRequest $request)
    {

        $contact = $request->input('last_name') . ' ' . $request->input('first_name');

        //dd($contact);
        $contacts = new Contact;
        $contacts->gender=$request->gender;
        $contacts->email=$request->email;
        $contacts->postcode=$request->postcode;
        $contacts->address=$request->address;
        $contacts->building_name=$request->billname;
        $contacts->opinion=$request->content;
        $contacts->fullname=$contact;
        $contacts->save();

        return view('thanks');
    }


    public function admin(Request $request)
    {
        $contacts = Contact::query()->paginate(10);

        return view('admin', compact('contacts', 'request'));
    }


    public function destroy(Request $request, $id)
    {
        Contact::find($id)->delete();

        return redirect()->route('search', session('searchItems'));
    }


    public function search(Request $request)
    {
        //dd($request);

        $query = DB::table('contacts');

        if (!empty($request->fullname)) {
            $query->where('fullname', 'LIKE', "%" . $request->fullname . "%");
        }

        if (!empty($request->gender)) {
            $query->where('gender', $request->gender);
        }

        if (!empty($request->email)) {
            $query->where('email', 'LIKE', "%" . $request->email . "%");
        }

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $contacts = $query->paginate(10)->appends($request->except('page'));

        $searchItems = $request->only(['fullname','gender','email', 'start_date', 'end_date']);

        session(['searchItems' => $searchItems]);

        return view('admin', compact('contacts', 'request'));
    }
}
