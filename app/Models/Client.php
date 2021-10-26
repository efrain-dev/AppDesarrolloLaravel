<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = ['id_cliente'];
    protected $primaryKey = 'id_cliente';
    protected $table = 'cliente';
    public $timestamps = false;
}
