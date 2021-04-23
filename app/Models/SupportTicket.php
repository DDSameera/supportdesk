<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'subject',
        'description',
        'priority',
        'status',
        'customer_id'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function supportTicketReplies(){
        return $this->hasMany(SupportTicketReply::class);
    }

}
