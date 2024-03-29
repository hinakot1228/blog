<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルを使うための準備
// postモデルを使うための準備＝postsテーブルにアクセス
use App\Post;

// UserテーブルはAuth機能を錯視すれば自動でUserモデルが使えるようになる
use App\User;
use Auth;

class PostController extends Controller
{
    //
    // ここにモデルへのアクセスして、データを取ってきたり、データを作ったり、更新したり、編集・削除する処理を書く
    public function index()
    {
        // $login_user_id = Auth::id();
        // dd($login_user_id);

        // $user = Post::find(1)->user->name;
                                // ↑user：Post.php（モデル）のuserメソッド
        $posts = Post::all();
        // dd($posts);

        // 一覧機能を作るためのメソッド
        // DBにあるpostsデータを取ってきて、postフォルダのindex.blade.phpへデータを渡す
        // $posts = Post::all();
        // dd($posts);
        // エロクアント
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
        // Postクラスであり、Modelクラスである→モデル＝DB、つまり、DBに接続する＝Postテーブルに接続する　→「エロクアント」
        $post = new Post;
        // 左辺がDB（カラム）,右辺がフォームの中身（name属性）
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = 1;

        $post->save();
        
        // リダイレクト処理
        return redirect()->route('posts.index');
    }

    // web.phpの{post}が$idとなる
    public function show($id)
    {
        // 送られてきたidでデータベース検索、該当のデータを抽出
        $post = Post::find($id);
        // dd($post);
        return view('posts.show', ['post'=>$post]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post'=>$post]);
    }

                        // ↓formで送信されたデータが格納されたもの
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = 1;

        $post->save();
        return view('posts.show', compact('post'));
    }
}
