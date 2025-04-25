<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
   public function up(): void
    {
        Schema::create('app-users', function (Blueprint $table) {
            $table->string('user_id')->primary();
            $table->string('user_fname');
            $table->string('user_lname');
            $table->string('user_password');
            $table->timestamps();
        });
    }

    
     
    public function down(): void
    {
        Schema::dropIfExists('app-users');
    }
};
