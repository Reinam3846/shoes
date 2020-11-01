<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request, $id)
    {
       if(\Auth::check()){
      // 認証済みユーザ（閲覧者）が、 idのユーザをフェイバリットする
           \Auth::user()->favorite($id);
           return back();
       } else {
           return view('auth/login');
        // 前のURLへリダイレクトさせる
       }
    }
    /**
     * ユーザをアンフォローするアクション。
     *
     * @param  $id  相手ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフェイバリットする
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
} //
