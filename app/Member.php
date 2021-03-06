<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function positionr()
    {
        return $this->belongsTo('App\Position', 'position');
    }

    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }

    public function blockMember(){
        return $this->belongsTo('App\BlockMember','block_member_id');
    }

}
