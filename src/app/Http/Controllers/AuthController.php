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
        // ページネーションが上手く実装できませんでした。
        $contents = Content::simplePaginate(7);
        $categories = Category::all();
        return view('auth.admin', compact('contents','categories'));
    }

    // 検索機能の実装が上手くいきませんでした。
    public function search(Request $request){
         $contents=Content::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->created_at);
         $categories=Category::all();
         return view('auth.admin',compact('contents','categories'));
    }
    public function destroy(Request $request){
        Content::find($request->id)->delete();
        return redirect('/admin');
    }
}
