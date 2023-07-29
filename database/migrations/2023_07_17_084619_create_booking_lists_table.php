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
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('user_id');
            // $table->integer('room_id');
            // $table->integer('user_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('qty_participants');
            $table->integer('food');
            $table->string('description');
            $table->enum('status', ['DISETUJUI', 'DIGUNAKAN', 'DITOLAK', 'EXPIRED', 'BATAL', 'SELESAI', 'PENDING']);
            $table->string('photo')->nullable();
            $table->text('resume')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('booking_lists');
    }
};
