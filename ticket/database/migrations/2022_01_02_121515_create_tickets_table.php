<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send_id');
            $table->unsignedBigInteger('receive_id');
            $table->bigInteger('ticket_id')->default(0);

            $table->string("title");
            $table->text("message")->nullable();
            $table->integer("chid")->default(0); // parent message
            $table->string("image")->nullable();
            $table->string("status")->default("pending");
            $table->bigInteger("code");
            $table->timestamps();

            // $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->foreign('send_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receive_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
