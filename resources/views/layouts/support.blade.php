
<?php

$msgs = \Illuminate\Support\Facades\DB::select("select m.id, m.text, m.is_me, m.created_at from chat c, msg m where c.id = m.chat_id and c.user_id = " . \Illuminate\Support\Facades\Auth::user()->id
    . " and c.created_at > DATE_SUB(NOW(), INTERVAL 6 HOUR) order by m.id asc");

foreach ($msgs as $msg) {
    $timestamp = strtotime($msg->created_at);
    $msg->time = MiladyToShamsiTime($timestamp);
}
?>

<div id="root" class="hidden">

    <div class="header-wrapper"></div>
    <div class="fixed-height" id="chatbox-container">
        <div class="chatbox  conversation-part--animation" id="msgs">
            <div class="conversation-part conversation-part--question">
                <div class="avatar-wrapper same-row">
                    <div class="avatar"></div>
                </div>
                @if(count($msgs) == 0)
                    <div class="same-row question-part text-ltr">
                        <div class="bubble no-border" style="display: table; direction: unset;">
                            <div class="bubble-label">
                                <div>به مرکز پشتیبانی خوش آمدید.</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @foreach($msgs as $msg)
                <div class="conversation-part conversation-part--question" >
                    <div class="avatar-wrapper same-row"></div>
                    <div class="same-row question-part text-ltr" style="{{($msg->is_me) ? "float: left;" : "float: right;"}}">
                        <div class="bubble no-border" style="display: table; direction: unset;">
                            <div class="bubble-label">
                                <div>{{$msg->text}}</div>
                            </div>

                        </div>

                        <span class="comment">{{$msg->time}}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="composer">
            <pre class="send-button glyphicon glyphicon-send"></pre>
            <textarea id="textInput" placeholder="سوال خود را بنویسید."></textarea>
        </div>

    </div>
    <div class="chat-buttons"></div>

    <div id="chat-bot-widget-close" class="glyphicon glyphicon-remove" title="Close"></div>
    <div id="chat-bot-widget-refresh" class="glyphicon glyphicon-refresh" title="Close"></div>
</div>


<div id="chat-bot-launcher-container" class="chat-bot-flex-end chat-bot-launcher-enabled">
    <div id="chat-bot-launcher" class="chat-bot-launcher chat-bot-flex-center chat-bot-launcher-active" style="background-color: rgb(7, 70, 166);"><div id="chat-bot-launcher-button" class="chat-bot-launcher-button"></div><div style="color: white; font-family: IRANSans" id="chat-bot-launcher-text">پشتیبانی آنلاین</div></div>
</div>
