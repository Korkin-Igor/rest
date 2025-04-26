<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->foreignIdFor(Category::class, 'category_id');
            $table->timestamps();
        });

        DB::table('posts')->insert([
            ['title' => 'Post 1', 'content' => 'Content 1', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Post 2', 'content' => 'Content 2', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Post 3', 'content' => 'Content 3', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
