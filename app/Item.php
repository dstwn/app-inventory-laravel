<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    protected $tabel = 'items'; 
    use Notifiable;
    protected $fillable = [
        'id', 'item_name'
    ];

}
