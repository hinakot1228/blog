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
        // エnロクアント
        return view('posts.index', ['posts'=>$posts]);
        
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // スーパーグローバル変数に格納されたデータを受け取る
        // 受け取ったデータをDBへ保存する

        $post = new Post;
        // 左辺がDB（カラム）,右辺がフォームの中身（name属性）
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = 1;

        $post->save();
        
        // リダイレクト処理
        return redirect()->route('posts.index');
    }
}
