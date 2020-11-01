<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
     public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(6);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }//
    
     public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        $shoes = $user->shoes()->orderBy('created_at', 'desc')->paginate(6);

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'shoes' => $shoes,
        
        ]);
    }
    
    public function favorites($id)
        // idの値でユーザを検索して取得
    {   
        $user = User::findOrFail($id);

        // ユーザのフェイバリット一覧を取得
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->paginate(6);
        
        // フェイバリット一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'favorites'=> $favorites,
           
        ]);
    }    
}
