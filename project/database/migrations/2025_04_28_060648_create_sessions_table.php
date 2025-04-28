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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Уникальный идентификатор сессии
            $table->foreignId('user_id')->nullable()->index(); // ID пользователя (если сессия привязана к пользователю)
            $table->string('ip_address', 45)->nullable(); // IP-адрес пользователя
            $table->text('user_agent')->nullable(); // Информация о браузере пользователя
            $table->text('payload'); // Данные сессии (зашифрованные)
            $table->integer('last_activity')->index(); // Время последней активности сессии
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
