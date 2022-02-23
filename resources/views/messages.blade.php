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
            .card{
                margin-left: 180px;
                border-color: black;
            }
            .card-body{
                margin-left: 180px;
    border-color: black;
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: 0.25rem;
            }
            .sender{
               float: right;
            }
            .recieve{
                float: left;
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


        <div class="col-8 ">
            <p >


              <h3 class="text-center">
                   {{$all_user->name}}</h3>


           </p>
            <div class="card" >
<div class="col-12">
    <div class="recieve">
<td>
@foreach ($chat_other as $reciv)
{{$reciv->message}}
@endforeach

</td></div>
</div><div class="col-12 ">
    <div class="sender">
<td >
hiii
</td></div></div>
            </div>
<div class="card-body">
    <form action="{{url('/store_comment')}}" method="POST">
        @csrf
                <div class="mb-3 text-center">
                    <label for="" class="form-label"></label>
                    <input type="text" class="form-control" name="message" id="message" aria-describedby="helpId"
                        placeholder="">
                        @error('message')
                            {{$message}}
                        @endif
                        <input type="text" class="form-control" name="reciever" id="reciever" aria-describedby="helpId"
                        placeholder="" value="{{$all_user->id}}" hidden>
                        <input type="text" class="form-control" name="sender" id="sender" aria-describedby="helpId"
                        placeholder="" value="{{$users->id}}" hidden>



                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>


</body>

</html>