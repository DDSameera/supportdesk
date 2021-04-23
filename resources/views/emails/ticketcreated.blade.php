<!DOCTYPE html>
<html>
<head>
    <title>Acknowledgement Email</title>
</head>
<body>

<p>
    Thanks for connecting with us. Here is your Ticket Information.
</p>

<table border="1">
    <tr>
        <td>Ticket Description</td>
        <td>{{$details['description']}}</td>
    </tr>
    <tr>
        <td>Ticket Reference</td>
        <td>{{$details['refNo']}}</td>
    </tr>
</table>

@if(isset($details['comment']))
    <hr/>
    <table border="0">
        <tr>
            <td><strong>Latest Reply </strong></td>

        </tr>
        <tr>
            <td><strong>{{$details['comment']}}</strong></td>
        </tr>
    </table>

@endif



<br/>
<p>Thank you.</p>

</body>
</html>
