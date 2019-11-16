$(function() {
    $('#form-event-date').datepicker(
        {
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        }
    );


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

})
//---------
// ADD TASK
//---------
$('#task-submit').click(function() {
    $.ajax({
        url: 'addtask',
        type: 'POST',
        data: $('#task-form').serialize(),
        dataType: 'json',
        success: function(result) {
            var task = result[0];
            var user = result[1];

            console.log(task);
            console.log(user);

            var taskbox = '<div class="task_item" id="' + task.id + '" draggable="true" ondragstart="drag(event)">'
            taskbox += task.title;

            if (task.id == user) {
                taskbox += '<span><img class="assign_star" src="img/star.svg"></span>';
            }

            taskbox += "</div>";

            $('#todo .task_column').append(taskbox);

                    
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    })
})


//----------
// ADD EVENT
//----------

$('#event-submit').click(function() {
    $.ajax({
        url: 'addevent',
        type: 'POST',
        data: $('#event-form').serialize(),
        dataType: 'json',
        success: function(result) {
            // alert(result);
            console.log(result);
            var e_id = result.date;
            console.log('#' + e_id);
            // console.log($('#' + e_id).innerhtml());
            $('#' + e_id).addClass('event-date');
            if ($('#' + e_id).hasClass('selected')) {
                $('#no-events').css('display','none');
                $('.event_box').remove();
                getEventInfo(e_id);
            }        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    })
})

$('.add-event').click(function() {
    var selected = $('.selected').attr('id');
    $('#form-event-date').val(selected);
})


//-----------
// TASK MODAL
//-----------


$(function() {
    $('.task_item').on('click', function() {
        // $('#info-modal .modal-title').text($(this).text());
        
        // get task info
        var taskid = $(this).attr('id').split('-')[1];
        console.log(taskid);

        $.ajax({
            url: 'gettask',
            type: 'POST',
            data: {
                'id' : parseInt(taskid)
            },
            success: function(result) {
                var task = result[0];
                var comments = result[1];

                $('.modal-task-title').text(task.title);
                $('.modal-event-title').text($('.side_title').text());

                $('.modal-task-summary').text(task.description);

                var colour = "";

                if (task.status === "To Do") {
                    colour = "red";
                }
                else if (task.status === "In Progress") {
                    colour = "yellow";
                }
                else {
                    colour = "green";
                }

                $('#info-modal .modal-content').css('border-left','solid 10px var(--' + colour + ')');
                
                // #info-modal .modal-content

                // add comments to modal
                var comment_box = "";

                $('.comment-section').html("");
                
                for (var i = 0; i < comments.length; i++) {
                    comment_box = "<div class='comment' id='" + comments[i].id + "'>";
                    comment_box += "<div class='comment-header'><span class='comment-author'>" + comments[i].authorname + "</span><span>" + (comments[i].updated_at).split(' ')[0] + "</span></div>";
                    comment_box += "<div class='comment-body'>" + comments[i].message + "<p></p></div></div>";
                    $('.comment-section').append(comment_box);
                }
                


                $('#info-modal').css('display','block');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus,errorThrown);
            }
        })

    })

    window.onclick = function(ev) {
        if (ev.target == document.getElementById('info-modal')) {
            $('#info-modal').css('display','none');
        }
    }
})
