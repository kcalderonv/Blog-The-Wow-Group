<?php

namespace App\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = ['fecha'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFechaAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y H:m');
    }
}
