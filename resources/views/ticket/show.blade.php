@extends('layouts.admin',['title'=>'Reply to Ticket'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div id="message" class="mt-2"></div>

            <form action="{{route('reply.create')}}" method="POST">
            @csrf
            <!--Hidden Values-->
                <input type="hidden" id="customer_id" name="customer_id" value="{{$supportTicket->customer_id}}"/>
                <input type="hidden" id="ticket_id" name="ticket_id" value="{{$supportTicket->id}}"/>
                <input type="hidden" id="ticket_replies_link" name="ticket_replies_link"
                       value="{{url('reply/ticketid/'.$supportTicket->id.'/all')}}"/>
                <!--Hidden Values-->

            @include('messages.flash-messages')


            <!--Ticket Reference-->
                <div class="form-group">
                    <h3 class="text-primary"><strong>Ticket #{{$supportTicket->ref_no}}</strong></h3>
                </div>
                <!--Ticket Referance-->

                <!-- Ticket Subject-->
                <div class="form-group">
                    <label class="badge badge-primary">Subject</label>
                    <p>{{$supportTicket->subject}}</p>
                </div>
                <!-- Ticket Subject-->


                <!-- Ticket Description-->
                <div class="form-group">
                    <label class="badge badge-secondary">Description</label>
                    <p>{{$supportTicket->description}}</p>
                </div>
                <!-- Ticket Description-->

                <!--Ticket Reply-->
                <div class="form-group">
                    <textarea id="ticket_reply_input" class="form-control" name="ticket_reply_input"> </textarea>
                </div>
                <!--Ticket Reply-->


                <button id="btn_reply" type="submit" class="btn btn-primary">Make a reply</button>
            </form>
        </div>
    </div>
    <hr/>

    <div class="row">
        <div class="col-12">
            <h6 class="badge badge-light">Agent Replies</h6>
            <div id="replies_container" class="mt-2"></div>
        </div>
    </div>


@endsection

@section('custom-js')
    @include('ajax.ticket-reply-js')
@endsection

