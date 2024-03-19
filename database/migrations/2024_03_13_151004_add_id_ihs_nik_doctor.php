<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//ini untuk menambahkan 2 field baru di existing table doctor yang telah ada
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('doctors', function (Blueprint $table) {
            //add id_ihs
            $table->string('id_ihs')->nullable()->after('sip');
            //add nik
            $table->string('nik')->nullable()->after('id_ihs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            //fungsi ini untuk membuang field id_ihs dan nik dalam table
            //$table->dropColumn('id_ihs');
            //$table->dropColumn('nik');
        });
    }
};
// setelah ini lihat model doctor dan tambahkan 2 field
//perintah di VScode Terminal adalah php migration karena hanya menyisipkan, tidak membuat dari awal (jangan pakai fresh)
