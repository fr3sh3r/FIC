<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileClinic extends Model
{
    use HasFactory;

    //ini hanya pengingat fieldname in table ProfileClinic
    // $table->id();
    // $table->string('name');
    // $table->string('address');
    // $table->string('phone');
    // $table->string('email');
    // $table->string('logo')->nullable();
    // $table->string('description')->nullable();
    // //doctor_name
    // $table->string('doctor_name');
    // //kode unik
    // $table->string('unique_code');
    // $table->timestamps();


    //Contoh Data
    // 'name' => 'Klinik Segar Bugar',
    // 'address' => 'Jl. Gatot Subroto no. 72 Jakarta',
    // 'phone' => '02155829122',
    // 'email' => 'service@klinik_segar_bugar.com',
    // 'doctor_name' => 'Dr. Richard Lee',
    // 'unique_code' => '123456',

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'doctor_name',
        'unique_code'
    ];
}
