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
 * @param ev Container
 * @param el Element
 */
let drop = (ev, el) => {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    el.appendChild(document.getElementById(data));

    //alert("Booped your snoot");

    $.ajax({
        url: 'updateTaskStatus',
        type: 'POST',
        //data: $('#event-form').serialize(),
        //dataType: 'json',
        success: function(result) {

            alert(result);

            // Update Front End
            updateState(id, state);    
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    })


}

/**
 * Update the task's state on the front end
 * @param id    Task ID
 * @param state Current State 
 */
let updateState = (id, state) => {
    $(id).removeClass("todo in_progress complete");
    switch(state) {
        case "To Do" : $(id).addClass("todo");
        case "In Progress" : $(id).addClass("in_progress");
        case "Complete" : $(id).addClass("complete");
    }
}