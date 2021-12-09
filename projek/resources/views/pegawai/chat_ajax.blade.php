<div class="chat-history">
    <ul class="m-b-0">
        @foreach ($datachat as $i=> $chat)
        @if ($chat->chat_from == "pegawai")
        <li class="clearfix">
            <div class="message-data text-right">
                {{-- <span class="message-data-time">10:10 AM, Today</span> --}}
                <span class="message-data-time">{{$chat->created_at}}</span>
                {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"> --}}

                @if ($chat->user_destination->pegawai_photo == "" || $chat->user_destination->pegawai_photo==null)
                    <img src="{{asset('/img/profile.png')}}" class="card-img-top rounded" style="height:40px;" alt="...">
                @else
                    <img src="{{asset('/storage/photos/'.$chat->user_destination->pegawai_photo)}}" class="card-img-top rounded" style="height:40px;" alt="...">
                @endif
            </div>
            {{-- <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div> --}}
            <div class="message other-message float-right">{{$chat->chat_text}}</div>
        </li>
        @else
        <li class="clearfix">
            <div class="message-data text-left">
                {{-- <span class="message-data-time">10:10 AM, Today</span> --}}
                <span class="message-data-time">{{$chat->created_at}}</span>
                {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"> --}}

                @if ($chat->user_sender->user_photo == "" || $chat->user_sender->user_photo==null)
                    <img src="{{asset('/img/profile.png')}}" class="card-img-top rounded" style="height:40px;" alt="...">
                @else
                    <img src="{{asset('/storage/photos/'.$chat->user_sender->user_photo)}}" class="card-img-top rounded" style="height:40px;" alt="...">
                @endif
            </div>
            {{-- <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div> --}}
            <div class="message other-message float-left">{{$chat->chat_text}}</div>
        </li>
        @endif
        @endforeach
        {{-- <li class="clearfix">
            <div class="message-data">
                <span class="message-data-time">10:12 AM, Today</span>
            </div>
            <div class="message my-message">Are we meeting today?</div>
        </li>
        <li class="clearfix">
            <div class="message-data">
                <span class="message-data-time">10:15 AM, Today</span>
            </div>
            <div class="message my-message">Project has been already finished and I have results to show you.</div>
        </li> --}}
    </ul>
</div>
