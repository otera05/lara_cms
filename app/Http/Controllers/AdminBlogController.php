<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\AdminBlogRequest;
use App\Models\Article;

class AdminBlogController extends Controller
{
    /**
     * @var Article
     */
    protected $article;

    function __construct(Article $article)
    {
        // Article モデルクラスのインスタンスを作成
        // 「依存注入」により、コンストラクタの引数にタイプヒントを指定するだけで
        // インスタンスが生成される（コンストラクターインジェクション）
        $this->article = $article;
    }

    /**
     * 記事投稿フォーム
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function form()
    {
        return view('admin_blog.form');
    }

    /**
     * 記事保存処理
     *
     * @param  AdminBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(AdminBlogRequest $request)
    {
        // こちらも引数にタイプヒントを指定すると、
        // AdminBlogRequest のインスタンスが生成される（メソッドインジェクション）
        // そして、AdminBlogRequest で設定したバリデートも実行される（フォームリクエストバリデーション）

        // 入力値の取得
        $input = $request->input();

        // create メソッドで複数代入を実行する。
        // 対象テーブルのカラム名と配列のキー名が一致する場合、一致するカラムに一致するデータが入る
        $article = $this->article->create($input);

        // リダイレクトでフォーム画面に戻る
        // route ヘルパーでリダイレクト先を指定。ルートのエイリアスを使う場合は route ヘルパーを使う
        // with メソッドで、セッションに次のリクエスト限りのデータを保持する
        return redirect()->route('admin_form')->with('message', '記事を保存しました');
    }
}
