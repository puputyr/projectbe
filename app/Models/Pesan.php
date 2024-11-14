<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = ['isi_pesan', 'tanggal_pesan', 'pesan_dari', 'room_chat_id'];
}
