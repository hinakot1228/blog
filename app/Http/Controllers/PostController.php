<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルを使うための準備
// postモデルを使うための準備＝postsテーブルにアクセス
use App\Post;

class PostController extends Controller
{
    //
    // ここにモデルへのアクセスして、データを取ってきたり、データを作ったり、更新したり、編集・削除する処理を書く
    public function index()
    {
        // 一覧機能を作るためのメソッド
        // DBにあるpostsデータを取ってきて、postフォルダのindex.blade.phpへデータを渡す
        $posts = Post::all();
        // dd($posts);
        // エロクアント
        return view('posts.index', ['posts'=>$posts]);
        
    }

    public function create()
    {
        return view('posts.create');
    }
}
