<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'support_ticket_id',
        'customer_id',
        'comment'
    ];


    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function supportTicket()
    {
        return $this->belongsTo(SupportTicket::class);
    }


    public function user()    {
        return $this->belongsTo(User::class);
    }


}
