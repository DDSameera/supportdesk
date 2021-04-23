<script>
    $("#btn_ticket_create").click(function () {

        var customerNameId = $("#customer_name_id").val();
        var customerEmailId = $("#customer_email_id").val();
        var customerPhoneNoId = $("#customer_phone_no_id").val();
        var ticketSubjectId = $("#ticket_subject_id").val();
        var ticketDescription = $("#ticket_description_id").val();


        $.ajax({
            dataType: "JSON",
            url: "{{ route('ticket.store') }}",
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                customer_name_input: customerNameId,
                customer_email_input: customerEmailId,
                customer_phone_no_input: customerPhoneNoId,
                ticket_subject_input: ticketSubjectId,
                ticket_description_input: ticketDescription
            },

        }).done(function (data) {

            //Success Messaage Alert
            printSuccessMessage(data);

            //Form Clear
            $('#create_ticket_form').trigger("reset");

        }).fail(function (reject) {
            printValidationErrors(reject);

        });

        //Print Success Messages
        function printSuccessMessage(data) {
            var html = "";
            $.each(data, function (key, value) {
                html += "<div class='alert alert-success'>";
                html += value;
                html += "</div>";
                $("#message").html(html);
            })
        }

        //Print Failure Messages
        function printValidationErrors(reject) {
            var html = "";

            $.each(reject.responseJSON.errors, function (key, value) {

                html += "<div class='alert alert-danger'>";
                html += value;
                html += "</div>";
                $("#message").html(html);
            })
        }


    });
</script>
