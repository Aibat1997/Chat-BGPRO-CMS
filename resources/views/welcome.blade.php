<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font: 13px Helvetica, Arial;
        }

        form {
            background: #000;
            padding: 3px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form input {
            border: 0;
            padding: 10px;
            width: 90%;
            margin-right: 0.5%;
        }

        form button {
            width: 9%;
            background: rgb(130, 224, 255);
            border: none;
            padding: 10px;
        }

        #messages {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #messages li {
            padding: 5px 10px;
        }

        #messages li:nth-child(odd) {
            background: #eee;
        }
        input{
            margin: 10px;
        }
    </style>
</head>

<body>
    <ul id="messages">
        @foreach ($messages as $item)
            <li>{{ $item->message }}</li>
        @endforeach
    </ul>
    <form action="">
      <input id="message" name="message">
      <button>Send</button>
    </form>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('public')
            .listen('MessageSent', (e) => {
                console.log(e);
                $('#messages').append($('<li>').text(e.message));
            });
    </script>
    <script>
      $(function () {
        var socket = io();
        $('form').submit(function(e) {
          e.preventDefault();
          axios.post('/store-message', {
                message: $('#message').val(),
            })
            .then(function (response) {
                console.log(response);
                $('#message').val('');
            })
            .catch(function (error) {
                console.log(error);
            });
        });
      });
    </script>
</body>

</html>