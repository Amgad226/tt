<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'type',
        'owner_id',
        'refernce'
     
    ];
    public function user(){
        return $this->belongsTo(User ::class,'user_id');
    }
}
