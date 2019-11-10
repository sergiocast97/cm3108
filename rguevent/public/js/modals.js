$(function() {
    $('#form-event-date').datepicker(
        {
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        }
    );
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
        
        $('#info-modal').css('display','block');
    })

    window.onclick = function(ev) {
        if (ev.target == document.getElementById('info-modal')) {
            $('#info-modal').css('display','none');
        }
    }
})
