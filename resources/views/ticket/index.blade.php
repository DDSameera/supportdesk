@extends('layouts.admin',['title'=>'New Support Tickets'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive p-4">
                <table class="table table-striped table-bordered dt-responsive nowrap data-table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Subject</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Customer</th>
                        <th>Make a Reply</th>

                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('custom-js')
    @include('datatable.view-all-tickets')
    @include('ajax.ticket-reply-js')
@endsection

