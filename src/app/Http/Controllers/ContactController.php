<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Content;

class ContactController extends Controller
{
    public function index()
    {
        // return view('login');
        $categories = Category::all();
        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->except('_token');
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }
    public function thanks(Request $request)
    {
        $content = $request->except('_token');
        Content::create($content);
        return view('/thanks');
    }
}
