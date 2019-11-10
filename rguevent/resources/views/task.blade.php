<div id="task-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <!-- Add Task Form -->
                <form id="task-form" class="info-form">
                    @csrf
                    <input type="hidden" name="event_id" value="3">

                    <div class="form-group">
                        <input class="textbox" id="form-task-title" type="text" name="title" placeholder="Title">
                    </div>                  

                    <div class="form-group">
                        <textarea class="textbox" id="form-task-desc" name="description" rows="3" placeholder="Description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button" data-dismiss="modal">Close</button>
                <button id="task-submit" type="button" class="button" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>