<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckSupportTicketRequest;
use App\Http\Requests\SupportTicketCheckRequest;
use App\Http\Requests\SupportTicketRequest;
use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\SupportTicket;
use App\Models\SupportTicketReply;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupportTicketController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $supportTicket = SupportTicket::with('customer')->get();
            return DataTables::of($supportTicket)
                ->addIndexColumn()
                ->addColumn('customer_name', function ($row) {
                    return $row->customer->name;
                })
                ->addColumn('action', function ($row) {
                    $ticketId = $row->id;
                    $replyLink = route('reply.index', $ticketId);
                    $html = "<a class='btn btn-sm btn-primary' href='$replyLink'>Make a Reply</a>";

                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('ticket.index');

    }


    public function create()
    {
        return view('ticket.create');
    }

    public function store(SupportTicketRequest $supportTicketRequest)
    {

        $supportTicketInputs = $supportTicketRequest->validated();


        //1.Customer Table

        $customer = Customer::create([
            'name' => $supportTicketInputs['customer_name_input'],
            'email' => $supportTicketInputs['customer_email_input'],
            'phone_no' => $supportTicketInputs['customer_phone_no_input'],
        ]);
        $customerId = $customer->id;

        //2.Support Ticket Table
        $refNo = rand(100000, 999999);


        SupportTicket::create([
            'ref_no' => $refNo,
            'subject' => $supportTicketInputs['ticket_subject_input'],
            'description' => $supportTicketInputs['ticket_description_input'],
            'priority' => 'medium',
            'status' => 'open',
            'customer_id' => $customerId,


        ]);

//3. Send Email
        $details = [
            'subject' => "Ticket #" . $refNo . "-" . $supportTicketInputs['ticket_subject_input'],
            'description' => $supportTicketInputs['ticket_description_input'],
            'customerEmail' => $customer->email,
            'refNo' => $refNo
        ];
        dispatch(new SendEmailJob($details));


        //4. JSON Success Message Output
        return response()->json([
            "message" => "Ticket Created Successfully & Email Acknoledgement has been mailed."
        ], 200);

    }

    public function check(Request $request)
    {

        if ($request->ajax()) {
            $refNo = $request->get('ref_no_input');


            $supportTicketReplies = SupportTicket::with('supportTicketReplies')
                ->where('ref_no', '=', $refNo)
                ->get();


            return response()->json($supportTicketReplies, 200);

        }

        return view('ticket.check');
    }


}
