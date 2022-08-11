<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('following_id');
            $table->integer('followed_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));

            // 外部キー制約(8/8以下の流れを詳しく調べる)
            $table->foreign('following_id')->references('id')->on('users')->onDelete('cascade');
            //foreignメソッドでfollowing_idを外部キーに設定する。
            //referencesメソッドで、従テーブルのfollowing_idと紐付いている主テーブルのidを指定する。
            //onメソッドで主テーブルusersを指定する。
            //onDeleteメソッドでuserが削除・更新された場合の処理を記述する。今回、引数はcascadeを指定する。
            
            $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');

            // following_idとfollowed_idの組み合わせの重複を許さない
            $table->unique(['following_id', 'followed_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
