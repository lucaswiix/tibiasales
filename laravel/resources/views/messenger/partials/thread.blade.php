<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
<?php $url = explode('/', $_SERVER["REQUEST_URI"]);
    if(!isset($url[3])) $url[3] = ''; ?>

<a href="{{ route('messages.show', $thread->id) }}" class="mensagensindex">
<div class="chat_list {{($thread->id == $url[3]) ? 'active_chat' : ''}}">
              <div class="chat_people">
                <div class="chat_img"> {{-- <img src="" alt="sunil"> --}} </div>
                <div class="chat_ib">
                  <h5><b>{{ $thread->creator()->nick }}</b> 
                    @if($thread->userUnreadMessagesCount(Auth::id()) > 0)
                                    <span class="badge badge-success"> ({{ $thread->userUnreadMessagesCount(Auth::id()) }}) </span>
                                    @endif
                        <span class="chat_date">{{Carbon\Carbon::parse($thread->created_at)->diffForHumans()}}
                        </span></h5>
                  <p><b>[{{ $thread->subject }}]</b> {{ $thread->latestMessage->body }}</p>
                </div>
              </div>
            </div> 
          </a>
