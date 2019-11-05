<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('full_name');
            $table->string('nick_name')->nullable()->comment('Apelido do clube');
            $table->date('birthday')->nullable()->comment('data de nascimento yyyy-mm-dd');

            $table->double('height', 3, 2)->nullable()->comment('altura 9.99');
            $table->double('weight', 6, 3)->nullable()->comment('peso 999.999');
            $table->string('position')->nullable()->comment('posição em que joga');
            $table->boolean('foreign')->nullable()->default('0')->comment('Identifica se é estrangeiro, 0=não | 1=sim');
            $table->string('country')->nullable()->comment('País natal');
            $table->bigInteger('city')->unsigned()->comment('Cidade natal');
            $table->bigInteger('state')->unsigned()->comment('Unidade da federação natal, composto por 2 caracteres(PR, RS, SP...)');
            $table->boolean('status')->nullable()->comment('Informa se o registro está completo');
            $table->bigInteger('clube_id')->unsigned();
            $table->foreign('clube_id')->references('id')->on('clubes');

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
        Schema::dropIfExists('jogadors');
    }
}
