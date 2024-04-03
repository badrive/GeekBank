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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->cajscadeOnDelete()->cascadeOnUpdate();
            $table->string("number");
            $table->string("code");
            $table->date("date");
            $table->string("rib");
            $table->boolean("active")->default(true);
            $table->boolean("visibility")->default(true);
            $table->integer("balance")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
