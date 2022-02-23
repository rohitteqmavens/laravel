<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



        <style>
            .card{
                height: 500px;
            }
            .chat{
                margin-block: 30px;
            }
        </style>
</head>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<body>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('fea8bb5cfc56957f9a90', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('status-liked');
        channel.bind('status-liked', function(data) {
            alert(JSON.stringify(data));

        });
    </script>


    <h1>Pusher Test</h1>

    <div class="row">
        <div class="col-3 text-center card ">
@foreach($all_user as $userall )
<div class="chat">
            <td >
                <a href="{{url('dash',['id'=>$userall->id])}}">
                    {{$userall->name}}
                    </a>
            </td>
        </div>
            @endforeach
        </div>
        <div class="col-8 ">
            <div class="card" >

               <p class="text-center">

                   <h2 class="text-center">
                       Hello {{$users->name}}

                       </h2><br><br>
                       <h4 class="text-center">
                           Welcome to the Portal ,<br>
                           Here we are teting the push notifications
                       </h4>
                       <br><br>
                       <h3 class="text-center">
                           Please Select the user from left side with whom you want to chat
                       </h3>

            </p>

            </div>


        </div>
    </div>


</body>

</html>
