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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('Fname', 100);
            $table->string('Lname', 100);
            $table->string('MeliCode', 12)->unique();
            $table->string('Address', 100);
            $table->string('PostalCode', 12);
            $table->string('Gender', 12);
            $table->string('group_name', 100);
            $table->index('group_name');
            $table->foreign('group_name')->references('Gname')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
