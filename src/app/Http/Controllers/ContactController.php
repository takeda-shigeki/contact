<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'sex', 'email', 'postal_code', 'addr11', 'building', 'inquiry']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')
                        ->withInput();
        }
        $old_key = 'addr11';
        $new_key = 'address';
        $request[$new_key] = $request[$old_key];
        unset($request[$old_key]);
        $lastname_firstname = $request->only(['last_name', 'first_name']);
        $string = implode(" ", $lastname_firstname);
        $fullname = ["fullname" => "$string"];
        $others = $request->only(['sex', 'email', 'postal_code', 'address', 'building', 'inquiry']);
        $contact = array_merge($fullname, $others);
        if ($contact['sex'] == "男性") {
        $contact['sex'] = "1";
        } elseif ($contact['sex'] == "女性") {
        $contact['sex'] = "2";
        }
        Contact::create($contact);
        return view('thanks');
    }

    public function admin()
    {
        return view('admin');
    }

    public function search(Request $request)
    {
        $results = Contact::CategorySearch($request->category_sex)->FullnameSearch($request->keyword_fullname)->EmailSearch($request->keyword_email)->FromSearch($request->from)->UntilSearch($request->until)->get();
        return view('admin', compact('results'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin/search');
    }

}
