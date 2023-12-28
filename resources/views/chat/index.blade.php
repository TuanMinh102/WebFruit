<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Laravel Pusher | Edlin App</title>
    <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- End JavaScript -->

    <!-- CSS -->
    <link rel="stylesheet" href="css/chatPusher.css">
    <!-- End CSS -->

</head>

<body>
    <div class="chat">

        <!-- Header -->
        <div class="top">
            <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
            <div>
                <p>Ross Edlin</p>
                <small>Online</small>
            </div>
        </div>
        <!-- End Header -->

        <!-- Chat -->
        <div class="messages">
            @include('chat/receive', ['message' => "Hey! What's up!  👋"])
            @include('chat/receive', ['message' => "Ask a friend to open this link and you can chat with them!"])
        </div>
        <!-- End Chat -->

        <!-- Footer -->
        <div class="bottom">
            <form>
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <button type="submit"></button>
            </form>
        </div>
        <!-- End Footer -->
    </div>


</body>

<script>
Pusher.logToConsole = true;
var pusher = new Pusher('951e298a4cf0d46d9655', {
    cluster: 'eu'
});
var channel = pusher.subscribe('public');
//Receive messages
channel.bind('chat', function(data) {
    $.post("/receive", {
            _token: '{{csrf_token()}}',
            message: data.message,
        })
        .done(function(res) {
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
        });
});

//Broadcast messages
$("form").submit(function(event) {
    event.preventDefault();

    $.ajax({
        url: "/broadcast",
        method: 'POST',
        headers: {
            'X-Socket-Id': pusher.connection.socket_id
        },
        data: {
            _token: '{{csrf_token()}}',
            message: $("form #message").val(),
        }
    }).done(function(res) {
        $(".messages > .message").last().after(res);
        $("form #message").val('');
        $(document).scrollTop($(document).height());
    });
});
</script>

</html>