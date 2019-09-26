<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * 感想記事のクラス
 */
class Articles extends Model
{
    //
    protected $table = 'articles';

    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = [
        'title' => 'required|',
        'message' => 'required|',
    ];

    //バリデーションのエラーメッセージ
    public static $messages = [
        'title.required' => '*タイトルを入力してください。',
        'message.required' => '*感想を入力してください。',
    ];

    /**
     * ユーザーの記事を取得する
     *
     */
    public function getUserArticle(int $user_id, string $sortTarget): object
    {
        # code...
        $article = DB::table($this->table)
            ->where('user_id', $user_id)
            ->orderBy($sortTarget, 'DESC')
            ->paginate(5);

        return $article;
    }

    /**
     * 指定の記事を削除する
     */
    public function deleteArticle(int $deleteArticle_id): bool
    {
        # code...
        try {
            //code...
            DB::delete('DELETE FROM articles
        WHERE id = ?', [$deleteArticle_id]);
            return true;
        } catch (\Throwable $th) {
            //throw $th
            return false;
        }
    }
}
