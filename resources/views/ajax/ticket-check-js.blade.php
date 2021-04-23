<script>
    //**************************************************
    //1. Load One Record
    //*************************************************


    $("#btn_search").click(function (e) {
        e.preventDefault();

        var refNoInput = $("#ref_no_input").val();

        loadAllReplies(refNoInput);
    });

    function loadAllReplies(refNo) {
        $.ajax({
            dataType: "JSON",
            url: "{{url('ticket/check')}}",
            type: 'GET',
            data: {
                _token: "{{ csrf_token() }}",
                ref_no_input: refNo,

            },

        }).done(function (data) {

            if (data == '') {

                var html = "";
                html += "<div class='alert alert-warning'>";
                html += "No Data Available in heres";
                html += "</div>";
                $("#ticket_info").html(html); //Clear

            } else {
                $("#ticket_info").html(""); //Clear
                $("#ticket_replies").html(""); //Clear

                $.each(data, function (key, value) {

                    //Ticket Info
                    var html = "";
                    html += "<div class='card mb-2'>";
                    html += "<div class='card-body'>";
                    html += "<h3 class='badge badge-secondary'>Subject: </h3>";
                    html += "&nbsp";
                    html += value.subject;
                    html += "<h6 class='bade badge-light'>Description: </h6>";
                    html += "&nbsp";
                    html += value.description;
                    html += "</div>";
                    html += "</div>";

                    $("#ticket_info").append(html)


                    //Replies
                    $.each(value.support_ticket_replies, function (key, value) {
                        console.log(value)
                        var html = "";
                        html += "<div class='card mb-2'>";
                        html += "<div class='card-body'>";
                        html += "<h3 class='badge badge-secondary'>Comment:  </h3>";
                        html += "&nbsp";
                        html += value.comment;
                        html += "</div>";
                        html += "</div>";

                        $("#ticket_replies").append(html)

                    });

                })
            }


        }).fail(function (reject) {

        });
    }


</script>
