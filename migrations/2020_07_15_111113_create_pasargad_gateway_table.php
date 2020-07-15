<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasargadGatewayTable extends Migration
{
    function getTable()
    {
        return config('gateway.pasargad_gateway_table', 'pasargad');
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
            $table->string('terminalId')->unique();
            $table->string('merchantId')->unique();
            $table->string('certificate_path')->default(storage_path('gateway/pasargad/certificate.xml'));
            $table->string('callback_url')->default('/gateway/callback/pasargad');
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
