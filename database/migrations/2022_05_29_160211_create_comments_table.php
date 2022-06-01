<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->enum('value', ['0','1', '2','3','4','5'])->default('1');
            $table->enum('salarie', ['0','1', '2','3','4','5'])->default('1');
            $table->enum('equality', ['0','1', '2','3','4','5'])->default('1');
            $table->boolean('validate')->default(false);
            $table->string('title');
            $table->text('comments');
            $table->timestamps();
            
            $table->unsignedBigInteger('iduser');
            
            $table->unsignedBigInteger('idcomp');
        
            $table->foreign('iduser')->references('id')->on('users');
        
            $table->foreign('idcomp')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
