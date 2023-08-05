<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suggest_reaction', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->comment('開始日');
            $table->string('event_name')->comment('イベント名');
            $table->text('content')->nullable()->default(null)->comment('作品の内容');;
            $table->integer('reaction_count')->comment('リアクション数')->default(1);
            $table->datetime('created_at');
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->boolean('delete_flg')->comment('デリートフラグ')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggest_reaction');
    }
};
