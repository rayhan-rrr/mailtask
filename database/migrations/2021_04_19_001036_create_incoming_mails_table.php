<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_mails', function (Blueprint $table) {
            $table->id();
            $table->string('from_mail', 100);
            $table->string('from_name', 100);
            $table->string('to_mail', 100);
            $table->string('to_name', 100);
            $table->string('subject', 255);
            $table->longText('body');
            $table->boolean('read');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_mails');
    }
}
