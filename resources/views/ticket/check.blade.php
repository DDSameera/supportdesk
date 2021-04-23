@extends('layouts.admin',['title'=>'Check Ticket Status'])

@section('content')

    <div class="mt-2">
        <div class="row">
            <div class="col-12">

                <form action="javascript:void(0)">
                    <div class="form-group">
                        <label>Ticket Reference Number</label>
                        <input id="ref_no_input" class="form-control" type="text" name="ref_no_input"
                               placeholder="Enter Your Ticket Reference Number"/>
                    </div>
                    <button id="btn_search" type="submit" class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="ticket_info" class="mt-2"></div>
                <div id="ticket_replies"></div>
            </div>
        </div>
    </div>


@endsection

@section('custom-js')
    @include('ajax.ticket-check-js')
@endsection

