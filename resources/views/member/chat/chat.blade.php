@extends('member.layout.master')

@section('content')
<div id="app" class="container">
    <h3 class="text-center">Messaging | User: {{ auth()->user()->name }}</h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="inbox_chat">
                    @foreach($users as $user)
                    @if($user->role === 'member' && $user->id !== auth()->id())
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img">
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="user">
                                </div>
                                <div class="chat_ib">
                                    <h5>{{ $user->name }} <span class="chat_date">{{ $user->created_at }}</span></h5>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    @foreach($messages as $message)
                        @if($message->user_id !== auth()->id())
                            <div class="incoming_msg">
                                <div class="incoming_msg_img">
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="user">
                                </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>{{ $message->message }}</p>
                                        <span class="time_date"> {{ $message->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>{{ $message->message }}</p>
                                    <span class="time_date"> {{ $message->created_at }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="message" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o"
                                    aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection