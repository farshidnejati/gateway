<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsanpardakhtGatewayTable extends Migration
{
    function getTable()
    {
        return config('gateway.asanpardakht_gateway_table', 'asanpardakht');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->engine="innoDB";
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('merchantId')->unique();
            $table->string('merchantConfigId')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('key')->unique();
            $table->string('iv')->unique();
            $table->string('callback_url');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on(config('user_table','users'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTable());
    }
}
