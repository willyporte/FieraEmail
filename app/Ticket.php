<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['name', 'city', 'email', 'won'];

    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'lIKE', '%'.$email.'%');
    }

    public function scopeWon($query, $won)
    {
        $wons = ['omaggio', 'gadget','all'];
        if ($won <> 'all' AND $won <> NULL AND in_array($won, $wons)) {
            return $query->where('won', $won);
        }
    }

    public function getDataAttribute() {
        return Carbon::parse('created_at')->diffForHumans();
    }

}
