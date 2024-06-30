<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Category;

class AuthController extends Controller
{
    public function index()
    {
        // $contents = Content::with('category');
        $contents = Content::Paginate(7);
        $categories = Category::all();
        return view('auth.admin', compact('contents', 'categories'));
    }

    // 検索機能の実装が上手くできませんでした。
    public function search(Request $request)
    {
         $contents=Content::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at)->get();
        $categories = Category::all();
        return view('auth.admin', compact('contents', 'categories'));
    }
    public function destroy(Request $request)
    {
        Content::find($request->id)->delete();
        return redirect('/admin');
    }


}
