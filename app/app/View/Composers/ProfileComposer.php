<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Memo;
use App\Models\Tag;

class ProfileComposer
{
    /**
     * データをビューと結合
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // get the current user
        $user = \Auth::user();
        // インスタンス化
        $memoModel = new Memo();
        $memos = $memoModel->myMemo(\Auth::id());

        // タグに取得
        $tagModel = new Tag();
        $tags = $tagModel->where('user_id', \Auth::id())->get();

        $view->with('user', $user)->with('memos', $memos)->with('tags', $tags);
    }
}
