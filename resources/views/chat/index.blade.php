<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Laravel Pusher</title>
    <link rel="icon" href="{{ asset('image3.jpeg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- JavaScript -->
    <script src="{{ asset('chat/pusher.min.js') }}"></script>
    <script src="{{ asset('chat/jquery.min.js') }}"></script>
    <!-- End JavaScript -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('chat/style.css') }}">
    <!-- End CSS -->

</head>

<body>
    <div class="chat">

        <!-- Header -->
        <div class="top">
            <img src="{{ asset('image1.png') }}" alt="Avatar">
            <div>
                <p>Live Chat</p>
                <small>Online</small>
            </div>
        </div>
        <!-- End Header -->

        <!-- Chat -->
        <div class="messages">
            @include('chat.receive', ['message' => "Hey! What's up!  👋"])
            @include('chat.receive', [
                'message' => 'Ask a friend to open this link and you can chat with them!',
            ])
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
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu'
    });
    const channel = pusher.subscribe('public');

    //Receive messages
    channel.bind('chat', function(data) {
        $.post("/receive", {
                _token: '{{ csrf_token() }}',
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
                _token: '{{ csrf_token() }}',
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
