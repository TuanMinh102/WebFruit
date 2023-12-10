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
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/chat.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- End CSS -->

</head>

<body>
    <div id="app" class="container chat">
        <h3 class=" text-center">Messaging | User: </h3>
        <h3 class=" text-center">Messaging | Admin</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="inbox_chat">

                        <div class="chat_list" id="user" onclick="location.href='chat'" style="cursor:pointer;">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="img/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5>tuan<span class="chat_date">Dec 25</span></h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mesgs">
                    <div id="container-history">
                        <div id="msg">
                            <div>
                                <div class="messages">
                                    @include('ReceiveMessage',['message'=>"Hey! What's up!  👋",'time'=>now()])
                                    @foreach($chat as $row)
                                    @if($row->IsUser==1)
                                    @include('BroadcastMessage',['message'=>$row->NoiDung,'time'=>$row->ThoiGian])
                                    @else
                                    @include('ReceiveMessage',['message'=>$row->NoiDung,'time'=>$row->ThoiGian])
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <form>
                                    <input type="text" class="write_msg" name="message" placeholder="Type a message"
                                        id="message" autocomplete="off">
                                    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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