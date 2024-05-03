<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';

    protected $fillable = ['date_start', 'date_end', 'leave_type', 'user_id','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
