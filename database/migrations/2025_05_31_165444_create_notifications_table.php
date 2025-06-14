<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');          // Penerima notifikasi
            $table->string('type');                         // Jenis notifikasi: jadwal, tugas, event
            $table->text('message');                        // Isi pesan
            $table->boolean('is_read')->default(false);     // Status terbaca
            $table->dateTime('scheduled_time');             // Waktu notifikasi dijadwalkan
            $table->timestamps();

            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
