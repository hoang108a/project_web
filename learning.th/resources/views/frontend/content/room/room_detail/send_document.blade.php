@extends('frontend.layouts.room_detail')
@section('title')
    Learning Together Room
@endsection
@section('style')
        <style type="text/css">
            .blackboard
            {
                background: url("{{asset('front_assets/images/room/blackboard.png')}}") no-repeat center center;
                background-size: cover;
                /*width: 600px;*/
                height: 450px;
                /*border: 1px solid red;*/
            }
            .id_room
            {
                border: 2px solid goldenrod;
                text-align: center;
                color: coral;
                margin-top: 50px;
            }
            .body_room
            {
                margin-top: 30px;
            }
            .tt1
            {
                margin-top: 50px;

            }
            .tt1 a
            {
                font-size: 20px;
            }

            .user_img
            {
                height: 100px;
                text-align: center;
            }
            .user_img img
            {
                width: 95px;
                height: 100px;
                border-radius:50%;
                -moz-border-radius:50%;
                -webkit-border-radius:50%;
                border: 1px solid black;
                background: gainsboro;
            }
            .right_message
            {
                height: 300px;
                background: url("{{asset('front_assets/images/room/mess_background.jpg')}}") no-repeat center center;
                background-size: cover;
                border: 1px solid darkred;

            }
            .right_message p
            {
                font-size: 24px;
                color: black;
                text-align: center;
            }
            .document_room
            {
                border: 2px solid black;
                height:150px;
            }
            .document_room p
            {
                font-size: 24px;
                color: black;
                text-align: center;

            }
            .document_box
            {
                margin-left: 20px;
                margin-top: 10px;
            }
            .blackboard .title
            {
                text-align: center;
                margin-top: 30px;


            }
            .blackboard .title p
            {
                font-size: 28px;
                color: white;
            }
            .blackboard .discussion p
            {
                font-size: 18px;
                color: white;
                margin-left: 10px;
            }
            .button_blackboard
            {
                margin-left: 15px;
            }


        </style>

@endsection
@section('content')

<div class="row room_body_header banner1" style="min-height: 100px">
    <div class="col-md-1"></div>
    <div class="col-md-2 id_room">
        <h1> ID: {{$room->id}}</h1>

    </div>
    <div class="col-md-2 ">

    </div>
    <div class="col-md-4 tt1">
        <a class="btn btn-success" href="{{url('')}}" style="width:150px">Invite Friends</a></div>
        <a class="btn btn-warning" href="{{url('room/outroom/'.$room->id)}}" style="width: 100px; margin-top:55px">Out Room</a></div>
    </div>
</div>
<div class="row body_room">
    <div class="col-md-9">
        <div class="col-md-2">

            <div class="user" style="margin-top: 50px">
                <?php
                use App\User;
                $id = $room->id_author;
                $user = User::find($id);
                $name = $user->name;
                $userdetail = \App\Model\UserDetailModel::find($id);
                $image = $userdetail->image;
                $name = $userdetail->last_name . $userdetail->first_name;
                ?>
                <div class="user_img">
                    <img src="{{asset($image)}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">

                    <p style="padding-top: 10px">{{$name}}</p>
                </div>

            </div>
            <div id="user_2" class="user" style="margin-top: 50px">
                <?php
                if ($room->count >= 2)
                {
                ?>
                <?php
                $member = [];
                $member = json_decode($room->members);
                $id = $member[1];
                $user = User::find($id);
                $name = $user->name;
                $userdetail = \App\Model\UserDetailModel::find($id);
                $image = $userdetail->image;
                $name = $userdetail->last_name . $userdetail->first_name;
                ?>
                <div class="user_img">
                    <img src="{{asset($image)}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="padding-top: 10px">{{$name}}</p>
                </div>


                <?php
                }else
                {?>
                <div class="user_img">
                    <img src="{{asset('front_assets/images/room/null_avatar.png')}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="padding-top: 10px"> Empty</p>
                </div>
                <?php }?>


            </div>

        </div>
        <div class="col-md-8 blackboard">
               <div class="title">
                    <p style="text-align: center; font-size: 26px; color: white">Send Document</p>

               </div>
               <div class="discussion">
                     <form action="{{url('room/senddocument/'.$room->id)}}" enctype="multipart/form-data"method="post">
                         @csrf
                         <div>
                             <input name="name" type="text"  style="width: 95%; height: 200px" placeholder="Name Document">
                             <input name="document" type="file"  style="width: 95%; height: 50px" placeholder="Document">


                         </div>
                         <input  class="btn btn-warning" type="submit" value="Send" style="margin-top: 10px"></input>
                     </form>
               </div>

        </div>
        <div class="col-md-2">
            <div id="user_3" class="user" style="margin-top: 50px">
                <?php
                if ($room->count >= 3)
                {
                ?>
                <?php
                $member = [];
                $member = json_decode($room->members);
                $id = $member[2];
                $user = User::find($id);
                $name = $user->name;
                $userdetail = \App\Model\UserDetailModel::find($id);
                $image = $userdetail->image;
                $name = $userdetail->last_name . $userdetail->first_name;
                ?>
                <div class="user_img">
                    <img src="{{asset($image)}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="padding-top: 10px">{{$name}}</p>
                </div>


                <?php
                }else
                {?>
                <div class="user_img">
                    <img src="{{asset('front_assets/images/room/null_avatar.png')}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="padding-top: 10px"> Empty</p>
                </div>
                <?php }?>


            </div>
            <div id="user_4" class="user" style="margin-top: 50px">
                <?php
                if ($room->count == 4)
                {
                ?>
                <?php
                $member = [];
                $member = json_decode($room->members);
                $id = $member[3];
                $user = User::find($id);
                $name = $user->name;
                $userdetail = \App\Model\UserDetailModel::find($id);
                $image = $userdetail->image;
                $name = $userdetail->last_name . $userdetail->first_name;
                ?>
                <div class="user_img">
                    <img src="{{asset($image)}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="padding-top: 10px">{{$name}}</p>
                </div>


                <?php
                }else
                {?>
                <div class="user_img">
                    <img src="{{asset('front_assets/images/room/null_avatar.png')}}" alt=""/>
                </div>
                <div style="background-color: darkgray; height: 50px;">
                    <p style="margin-top: 10px"> Empty</p>
                </div>
                <?php }?>

            </div>
        </div>

        </div>
    <div class="col-md-3">
        <div class="right_message">
            <div >
              <p>Messeage</p>
               <div id="mes_1" style="overflow:scroll; max-height: 200px; min-height: 200px">
               @foreach($mess as $mes)
                   <p style="font-size: 16px;text-align: left; margin-left: 5px"><strong>{{$mes->name}}</strong> : {{$mes->content}}</p><br>
               @endforeach
               </div>
               </div>
                <div style="margin-top: 0">
                    <form action="{{url('/sendmessage')}}" method="post">
                        @csrf
                        <input type="text" name="content" placeholder="Enter the message" style="margin-left: 10px; width: 200px;height:
                50px">
                        <input type="text" name="id_room" value="{{$room->id}}" style="display: none">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i><input class="btn btn-success" type="submit" value="Send">
                    </form>
                </div>

         </div>
        <div class="document_room">
            <p> Document</p>
            <div id="document" >
            @foreach($documents as $document)
                <div class="document_box">
                    <a href="{{asset($document->file)}}">{{$document->name}}</a>
                    <a class="btn btn-warning" style="float: right; margin-right: 5px;height: 30px" href="{{url('/room/download/'.$document->id)
                        }}">Download</a>
                </div>


            @endforeach
            {{ $documents->links() }}
            </div>

        </div>
    </div>
    <?php $id_room = $room->id; ?>

</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    var phantuchon      = $("#mes_1");
    var user2 = document.getElementById("user_2");;
    var user3 = document.getElementById("user_3");
    var user4 = document.getElementById("user_4");;
    var document1 = $("#document");
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
        cluster   : 'ap1',
        encrypted : true
    });


    // Subscribe to the channel we specified in our Laravel Event
    // message
    var channel = pusher.subscribe('Message');
    var id_room ={{$id_room}};
    // Bind a function to a Event (the full Laravel class)
    channel.bind('send-message', function (data) {
        console.log("hello1");
        console.log(data);
        if (data.id_room ==id_room)
        {
            var html = '<p style="font-size: 16px; float:left; margin-left: 5px"><strong>' + data.name + '</strong> :' + data.content + '</p> <br> ';
            phantuchon.append(html);
        }

    });
    // notify -join
    var channel1 = pusher.subscribe('Notify');
    channel1.bind('notify-join', function (data) {
        console.log("hello");
        console.log(data);
        if (data.id_room ==id_room)
        {
            if (data.stt==2)
            {

                var tt2 = 'http://learning.th/'+data.image;
                var tt1 = '<img src=\"'+tt2+'\" alt = \"'+'\"'+'/>';
                var html= '<div class=\"user_img\">'+tt1+'</div>'+
                    '<div style="background-color: darkgray; height: 50px;"><p style="padding-top: 10px">'+data.name+'</p></div>';
                user2.innerHTML = html;
            }
            else
            {
                if (data.stt==3)
                {
                    var tt2 = 'http://learning.th/'+data.image;
                    var tt1 = '<img src=\"'+tt2+'\" alt = \"'+'\"'+'/>';
                    var html= '<div class=\"user_img\">'+tt1+'</div>'+
                        '<div style="background-color: darkgray; height: 50px;"><p style="padding-top: 10px">'+data.name+'</p></div>';
                    user3.innerHTML = html;
                }
                else
                {
                    if(data.stt==4)
                    {
                        var tt2 = 'http://learning.th/'+data.image;
                        var tt1 = '<img src=\"'+tt2+'\" alt = \"'+'\"'+'/>';
                        var html= '<div class=\"user_img\">'+tt1+'</div>'+
                            '<div style="background-color: darkgray; height: 50px;"><p style="padding-top: 10px">'+data.name+'</p></div>';
                        user4.innerHTML = html;
                    }
                }
            }

        }

    });var channel3 = pusher.subscribe('Document');
    channel3.bind('notify-document', function (data) {
        console.log("hello3");
        console.log(data);
        if (data.id_room ==id_room)
        {
            /*html_title='<p style="text-align: center; font-size: 18px; color: white">'+data.title+'</p>';
            html_content = '<p style="text-align: left; font-size: 14px;margin-top: 5px; color: white">'+data.content+'</p>';
            title.innerHTML = html_title;




            content.innerHTML = html_content;*/
            var tt3 = 'http://learning.th/'+data.path;
            html =  '<div class="document_box">'+' <a href="'+tt3+'>'+data.name+' <a class="btn btn-warning" style="float: right; margin-right:' +
                ' 5px;height: 30px" href="';
            var tt4 = "\{\{url("+"/room/download/"+data.id +")\}\}"
            html = html+tt4+'">Download</a></div>';
            console.log(html);
            document1.append(html);
        }
    });
</script>
@endsection

