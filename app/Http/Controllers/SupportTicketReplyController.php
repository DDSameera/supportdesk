<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportTicketReplyRequest;
use App\Jobs\SendEmailJob;
use App\Models\SupportTicket;
use App\Models\SupportTicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SupportTicketReplyController extends Controller
{

    public function index(Request $request, $ticketId)
    {
        $supportTicket = SupportTicket::find($ticketId);
        return view('ticket.show', compact('supportTicket'));
    }

    public function showAll(Request $request)
    {
        $supportTicketId = $request->get('support_ticket_id');

        if ($request->ajax()) {

            //  1. Fetch All Support Ticket Replies
            $supportTicketReply = SupportTicketReply::with('user')
                ->where('support_ticket_id', '=', $supportTicketId)
                ->orderBy('created_at', 'DESC')
                ->get();

            //2. Generate JSON Output
            return response()->json($supportTicketReply, 200);
        }


    }

    public function create(SupportTicketReplyRequest $request)
    {

        $userId = Auth::id();

        $supportTicketReplyInputs = $request->validated();
        $comment = $supportTicketReplyInputs['ticket_reply_input'];

        $supportTicketId = $request->get('support_ticket_id');
        $customerId = $request->get('customer_id');

        SupportTicketReply::create(
            [
                'customer_id' => $customerId,
                'support_ticket_id' => $supportTicketId,
                'user_id' => $userId,
                'comment' => $comment
            ]
        );


        //3. Send Reply-Email

        $supportTicket = SupportTicket::with('customer')
            ->where('id', '=', $supportTicketId)
            ->first();

        $refNo = $supportTicket->ref_no;
        $subject = $supportTicket->subject;
        $description = $supportTicket->description;
        $customerEmail = $supportTicket->customer->email;

        $details = [
            'subject' => "Ticket #" . $refNo . "-" . $subject,
            'description' => $description,
            'customerEmail' => $customerEmail,
            'comment' => $comment,
            'refNo' => $refNo
        ];
        dispatch(new SendEmailJob($details));

        //4. Generate AJAX output
        return response()->json([
            "message" => "Ticket Updated Successfully"
        ], 200);
    }
}
