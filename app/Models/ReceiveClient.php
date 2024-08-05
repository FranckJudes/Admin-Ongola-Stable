<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'lastname', 'adresse', 'telephone', 'cni'
    ];
}
