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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Первичный ключ
            $table->morphs('tokenable'); // Полиморфная связь (например, с моделью User)
            $table->string('name'); // Название токена
            $table->string('token', 64)->unique(); // Уникальный токен
            $table->text('abilities')->nullable(); // Список разрешений (abilities)
            $table->timestamp('last_used_at')->nullable(); // Время последнего использования
            $table->timestamp('expires_at')->nullable(); // Время истечения срока действия
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
