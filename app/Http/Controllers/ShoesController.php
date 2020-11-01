<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shoe;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoes = Shoe::paginate(6);

        return view('shoes.index', [
            'shoes' => $shoes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);//
        $request->user()->shoes()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id); 
      $shoes = $user->shoes()->orderBy('created_at', 'desc')->paginate(6);
      return view('users.show', [
            'user' => $user,
            'shoes' => $shoes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $shoe = \App\Shoe::findOrFail($id);
       

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $shoe->user_id) {
            $shoe->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();  //
    }
    
    public function search(Request $request)
    {
        // shoesテーブルのnameカラムから$shoe_nameとwhereメソッドを使って、値を取得する
        // return view('shoes.index', [
        //     'shoes' => $shoes,
        // ]);
        $search = $request->input('search_word');
        
        $shoes = '';

       if ($request->has('search_word') && $search != '') {
            $shoes = Shoe::where('name', 'like', '%'.$search.'%')->paginate(6);
            
            return view('shoes.search',[
                'shoes' => $shoes,
                'search'=> $search,
            ]);           
        }
        return redirect()->route('shoes.index');

    }
}

