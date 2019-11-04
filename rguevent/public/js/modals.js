$(function() {
    $('#form-task-date').datepicker(
        {
            changeMonth: true,
            changeYear: true
        }
    );
})

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