$('#chat-form').on('submit', function(event){
    event.preventDefault();
// ajax script to post messages.
    $.ajax({
        url : 'Post/',
        type : 'POST',
        data : { msgbox : $('#chat-msg').val(), topicname : $('#topicname').val()},

        success : function(json){
            $('#chat-msg').val('');
            $('#msg-list').append('<li class="text-right list-group-item">' + json.msg + '</li>');
            var chatlist = document.getElementById('msg-list-div');
            chatlist.scrollTop = chatlist.scrollHeight;
        }
    });
});
// function to retrieve messages from db
function getMessages(){
    if (!scrolling) {
        var topicname = $('#topicname').val();
        console.log("name "+topicname)
        $.get('messages/',{topicname :topicname}, function(messages){
            $('#msg-list').html(messages);
            var chatlist = document.getElementById('msg-list-div');
            chatlist.scrollTop = chatlist.scrollHeight;
        });
    }
    scrolling = false;
}
// function to stop screen from redirecting to new messages, when scrolling through chat
var scrolling = false;
$(function(){
    $('#msg-list-div').on('scroll', function(){
        scrolling = true;
    });
    refreshTimer = setInterval(getMessages, 2500);

});

$(document).ready(function() {
     $('#send').attr('disabled','disabled');
     $('#chat-msg').keyup(function() {
        if($(this).val() != '') {
           $('#send').removeAttr('disabled');
        }
        else {
        $('#send').attr('disabled','disabled');
        }
     });
 });

// using jQuery
//funtion that works as csrf mechanism alternative for ajax
function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie !== '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);

            if (cookie.substring(0, name.length + 1) === (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}
var csrftoken = getCookie('csrftoken');

function csrfSafeMethod(method) {
    // these HTTP methods do not require CSRF protection
    return (/^(GET|HEAD|OPTIONS|TRACE)$/.test(method));

}
$.ajaxSetup({
    beforeSend: function(xhr, settings) {
        if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
            xhr.setRequestHeader("X-CSRFToken", csrftoken);
        }
    }
});