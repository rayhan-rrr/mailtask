<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_mail_id')->nullable();
            $table->string('email', 100);
            $table->longText('message');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('incoming_mail_id')
                  ->references('id')
                  ->on('incoming_mails')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_response');
    }
}
