<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
    <p>
        {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>创造者:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>参与者:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div>