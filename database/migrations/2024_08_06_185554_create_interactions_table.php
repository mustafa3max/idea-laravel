<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->nullable()->constrained('ideas', 'id');
            $table->ipAddress('user_ip')->nullable()->constrained('users', 'ip');
            $table->boolean('easy')->default(false);
            $table->boolean('unique')->default(false);
            $table->boolean('difficult')->default(false);
            $table->boolean('recurring')->default(false);
            $table->boolean('impossible')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interactions');
    }
};
