@extends('layouts.admin',['title'=>'New Support Tickets'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mt-2">
                <h1>Send Your Technical Problem</h1>
                <form id="create_ticket_form" action="javascript:void(0)" method="POST">
                    @csrf
                    <div id="message"></div>
                    <!--Customer Name-->
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" id="customer_name_id" name="customer_name_input"
                               placeholder="Enter Customer Name" value="{{old('customer_name_input')}}">

                        @if($errors->has('customer_name_input'))
                            <small class="form-text text-danger">{{ $errors->first('customer_name_input') }}</small>
                        @endif

                    </div>
                    <!--Customer Name-->

                    <!--Customer Email-->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="customer_email_id" name="customer_email_input"
                               placeholder="Enter Customer Email" value="{{old('customer_email_input')}}">
                        @if($errors->has('customer_email_input'))
                            <small class="form-text text-danger">{{ $errors->first('customer_email_input') }}</small>
                        @endif
                    </div>
                    <!--Customer Email-->

                    <!--Customer Phone Number-->
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" id="customer_phone_no_id" name="customer_phone_no_input"
                               placeholder="Enter Customer Phone Number" value="{{old('customer_phone_no_input')}}">

                        @if($errors->has('customer_phone_no_input'))
                            <small class="form-text text-danger">{{ $errors->first('customer_phone_no_input') }}</small>
                        @endif
                    </div>
                    <!--Customer Phone Number-->

                    <!-- Ticket Subject-->
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" id="ticket_subject_id" name="ticket_subject_input"
                               placeholder="Enter Ticket Subject" value="{{old('ticket_subject_input')}}">
                        @if($errors->has('ticket_subject_input'))
                            <small class="form-text text-danger">{{ $errors->first('ticket_subject_input') }}</small>
                        @endif
                    </div>
                    <!-- Ticket Subject-->


                    <!-- Ticket Description-->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="ticket_description_id" name="ticket_description_input"
                                  placeholder="Explain your Technical issue in brief">{{old('ticket_description_input')}}</textarea>

                        @if($errors->has('ticket_description_input'))
                            <small
                                class="form-text text-danger">{{ $errors->first('ticket_description_input') }}</small>
                        @endif
                    </div>
                    <!-- Ticket Description-->

                    <button id="btn_ticket_create" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('custom-js')
    @include('ajax.ticket-crete-js')
@endsection
