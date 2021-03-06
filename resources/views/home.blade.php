<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
    </script>
    <link rel="stylesheet" href="/css/chat.css">


</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            @foreach ($all_user as $user)
                                <a href="{{url('/chat_message',['id'=>$user->id])}}" class="">
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="/img/user3.jpeg" class="rounded-circle user_img">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>{{ $user->name }}</span>
                                                <p></p>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                            @endforeach


                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <div class="img_cont">
                                <img src="/img/user3.jpeg" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info">
                                <span>Chat with Khalid</span>
                                <p>1767 Messages</p>
                            </div>
                            <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                        <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="/img/user2.jpeg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Hi, how are you samim?
                                <span class="msg_time">8:40 AM, Today</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send">
                                Hi Khalid i am good tnx how about you?
                                <span class="msg_time_send">8:55 AM, Today</span>
                            </div>
                            <div class="img_cont_msg">
                                <img src="/img/user.png" class="rounded-circle user_img_msg">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
            <form  method="POST" id="chat_form">
                @csrf

                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <input type="text" class="form-control type_msg" name="message" id="message" aria-describedby="helpId"
                            placeholder="     @error('message')
                            {{ $message=" nothing to send" }}
                            @endif">
                            <input type="text" class="form-control" name="reciever" id="reciever" aria-describedby="helpId"
                            placeholder="" value="here we set another user id" hidden>
                        <input type="text" class="form-control" name="sender" id="sender" aria-describedby="helpId"
                            placeholder="" value="{{ $users->id }}" hidden>


                            {{-- <textarea name="" class="form-control type_msg"
                                placeholder="Type your message..."></textarea> --}}
                            <div class="input-group-append">
                                <span class="input-group-text send_btn"> <button type="submit" id="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow"></button></i></span>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script>
        $(document).ready(function() {
            $('#action_menu_btn').click(function() {
                $('.action_menu').toggle();
            });
            $('#chat_form').submit(function(){

                console.log($('message').val(),$('reciever').val(),$('sender').val());




$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

                $.ajax({
                    url:"/enterChat",
                    method:"POST",
                    data:{
                        message:$('message').val(),
                        reciever:$('reciever').val(),
                        sender:$('sender').val(),
                    },
                    success: function(response) {
                $('#chat_form')[0].reset();
                alert("comment added" );


                    }



        });
    </script>

</footer>

</html>
