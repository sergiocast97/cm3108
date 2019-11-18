/**
 * Allow Drop on the element
 * @param ev Element 
 */
let allowDrop = (ev) => {
    ev.preventDefault();
}

/**
 * On Drag Function
 * @param ev Element
 */
let drag = (ev) => {
    ev.dataTransfer.setData("text", ev.target.id);
}

/**
 * On Drop Function
 * @param ev Event
 * @param el Container
 */
let drop = (ev, el) => {

    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    el.appendChild(document.getElementById(data));

    // Getting new status
    newStatus = $(el).parent().attr('name');

    // Getting the task ID
    taskId = $(document.getElementById(data)).attr('id').split('-')[1];

    $.ajax({
        url: 'updateTaskStatus',
        type: 'POST',
        data: {
            'task_id'       : taskId,
            'task_status'   : newStatus
        },
        dataType: 'json',
        
        success: function(result) {
            console.log("Task (Id: " + taskId + ") moved to " + newStatus);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    })


}