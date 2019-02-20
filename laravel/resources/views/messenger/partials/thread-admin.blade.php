<tr>
<td><a href="{{ route('messages.show', $thread->id) }}" class="mensagensindex">{{ $thread->id }}</a></td>
<td>{{ $thread->creator()->nick }}</td>
<td>{{ $thread->subject }}</td>
<td>{{ $thread->latestMessage->body }}</td>
<td>{{Carbon\Carbon::parse($thread->created_at)->diffForHumans()}}</td>
</tr>