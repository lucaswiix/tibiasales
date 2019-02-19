    @if(auth::user()->nick != $message->user->nick )
            <div class="incoming_msg" style="margin-bottom: 20px;">
              <div class="incoming_msg_img"><a href="/user/{{ $message->user->nick }}" style="color:#000;"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></a> </div>
              <div class="received_msg">
                {{ $message->user->nick }}:
                <div class="received_withd_msg">
                  <p>{{ $message->body }}</p>
                  <span class="time_date"> {{ $message->created_at->diffForHumans() }}</span></div>
              </div>
            </div>
            @else
                <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{ $message->body }}</p>
                <span class="time_date">{{ $message->created_at->diffForHumans() }}</span> </div>
            </div>
            @endif