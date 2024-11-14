<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $categories = Category::all();
        $contents =$request->all();
        return view('confirm',compact('contents','categories'));
    }
    public function thanks(Request $request)
    {
        $form=$request->only(['category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        if($form['gender']=="男性"){
            $form['gender'] = 1;
        } elseif ($form['gender'] == "女性") {
            $form['gender'] = 2;
        }else{
            $form['gender'] = 3;
        }
        Contact::create($form);
        return view('thanks');
    }
}
