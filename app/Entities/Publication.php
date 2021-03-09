<?php

namespace App\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $with = ['user'];
    protected $appends = ['abstract','fecha'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
   {
      return $this->hasMany(comment::class);
   }

   public function getAbstractAttribute(){
        return substr(strip_tags($this->content),0,250);
   }

   public function getFechaAttribute(){
     return Carbon::parse($this->created_at)->format('d/m/Y');
   }
}
