<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('full_name');
            $table->string('nick_name')->nullable()->comment('Apelido do clube');
            $table->string('federal_division')->nullable()->comment('Pertence a que divisão no campeonato nacional. Exemplo: A- série A, B- série B');
            $table->string('state_division')->nullable()->comment('Pertence a que divisão no campeonato estadual. Exemplo: A- série A, B- série B');
            $table->date('birthday')->nullable()->comment('Data de aniversário, yyyy-mm-dd');
            $table->bigInteger('city')->unsigned()->comment('Cidade do endereço postal');
            $table->bigInteger('state')->unsigned()->comment('Unidade da federação, composto por 2 caracteres(PR, RS, SP...)');
            $table->boolean('status')->nullable()->comment('Informa se o registro está completo');
            $table->bigInteger('user_id')->unsigned();  
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubes');
    }
}
