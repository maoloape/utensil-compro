<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table = 'office';

    protected $fillable = [
        'title',
        'alamat',
        'telephone',
        'fax',
        'whatsapp',
        'email',
    ];
}
