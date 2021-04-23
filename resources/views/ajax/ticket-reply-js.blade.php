<script type="text/javascript">
    $(document).ready(function () {


        //Current Support Ticket ID
        var supportTicketId = $("#ticket_id").val();


        //**************************************************
        //1. Make a Reply
        //*************************************************
        $("#btn_reply").click(function (e) {
            e.preventDefault();

            var ticketReply = $("#ticket_reply_input").val();
            var customerId = $("#customer_id").val();

            $.ajax({
                dataType: "JSON",
                url: "{{ route('reply.create') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    ticket_reply_input: ticketReply,
                    support_ticket_id: supportTicketId,
                    customer_id: customerId
                },

            }).done(function (data) {

                //Clear Messages;
                $("#message").html("");

                //Print Success Message
                printSuccessMessage(data);

                //Load All Replies
                loadAllReplies(supportTicketId, loadRepliesUrl);

                // Clear Input Field
                $("#ticket_reply_input").val("");


            }).fail(function (reject) {
                //Clear Messages;
                $("#message").html("");

                //Print All Validation Errors
                printValidationErrors(reject);

            });


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


        //**************************************************
        //2. Load All Replies
        //*************************************************


        var loadRepliesUrl = $("#ticket_replies_link").val();

        loadAllReplies(supportTicketId, loadRepliesUrl);

        function loadAllReplies(supportTicketId, loadRepliesUrl) {
            $.ajax({
                dataType: "JSON",
                url: loadRepliesUrl,
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                    support_ticket_id: supportTicketId,

                },

            }).done(function (data) {
                $("#replies_container").html(""); //Clear

                $.each(data, function (key, value) {

                    var html = "";

                    if(key==0){
                        html += "<div class='card mb-2 alert-warning'>";
                    }else{
                        html += "<div class='card mb-2 bg-light'>";
                    }


                    html += "<div class='card-body'>";
                    html += value.comment;
                    html += "<span class='badge badge-info float-right'> ";
                    html += value.user.email;
                    html += "</span>";
                    html += "</div>";
                    html += "</div>";


                    $("#replies_container").append(html)
                })
            }).fail(function (reject) {

            });
        }


    });
</script>
