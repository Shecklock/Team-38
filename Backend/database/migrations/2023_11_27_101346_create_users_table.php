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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('role_as')->default('0')->comment('0=user,1=admin');
            $table->timestamps();
        });

        /**
         * Input dummy User and Admin account
         */
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('abcd1234'),
                'role_as' => '1'
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('abcd1234')
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
