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
        // create auth table schema
        Schema::create('auth_table',function(Blueprint $table){
            $table->id('uid');
            $table->string('FullName');
            $table->integer('Age')->length(11);
            $table->date('Birthday');
            $table->string('Username');
            $table->string('Email');
            $table->string('Password');
            $table->timestamp('Account_created')->useCurrent()->nullable();
            $table->timestamp('Account_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('auth_table');
    }
};  