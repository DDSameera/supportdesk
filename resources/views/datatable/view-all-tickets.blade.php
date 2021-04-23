<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ticket.index') }}",
            columns: [
                {data: 'ref_no', name: 'ref_no'},
                {data: 'subject', name: 'subject', orderable: false},
                {data: 'priority', name: 'priority',searchable: false},
                {data: 'status', name: 'status', searchable: false},
                {data: 'customer_name', name: 'customer_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
