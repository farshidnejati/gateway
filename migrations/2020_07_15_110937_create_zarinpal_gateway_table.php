<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Larabookir\Gateway\Enum;

class CreateZarinpalGatewayTable extends Migration
{
    function getTable()
    {
        return config('gateway.zarinpal_gateway_table', 'zarinpal');
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
            $table->string('merchant_id')->unique();
            $table->enum('type',Enum::ZARINPAL_TYPES)
                ->default(Enum::ZARINPAL_TYPES[0]);//default =zarin-gate
            $table->string('callback_url');
            $table->enum('server',Enum::ZARINPAL_SERVERS)
                ->default(Enum::ZARINPAL_SERVERS[0]);//default = germany
            $table->string('email')->unique();
            $table->string('mobile',11)->unique();
            $table->text('description')->nullable();
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
