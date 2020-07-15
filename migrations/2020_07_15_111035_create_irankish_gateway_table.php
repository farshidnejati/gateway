<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrankishGatewayTable extends Migration
{
    function getTable()
    {
        return config('gateway.irankish_gateway_table', 'irankish');
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
            $table->string('sha1key');
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
