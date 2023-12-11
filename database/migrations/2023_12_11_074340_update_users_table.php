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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone');
            $table->string('avatar', 500);
            $table->string('birthday');
            $table->string('address');
            $table->unsignedBigInteger('id_role');
            $table->tinyInteger('deleted')->default(0);
            $table->foreign('id_role')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
