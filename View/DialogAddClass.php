<div class="modal fade" id="AddClass" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Create Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <form action="../Handle/CreateClassProcess.php" method="POST">
                    <div class="form-group">
                        <label for="txtClassName" class="col-form-label">Class Name</label>
                        <input type="text" class="form-control" id="txtClassName" name="txtClassName">
                    </div>
                    <div class="form-group">
                        <label for="txtSubjectName" class="col-form-label">Subject</label>
                        <input type="text" class="form-control" id="txtSubjectName" name="txtSubjectName">
                    </div>
                    <div class="form-group">
                        <label for="txtRoom" class="col-form-label">Room</label>
                        <input type="text" class="form-control" id="txtRoom" name="txtRoom">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="txtUserName" name="txtUserName" value="<?php echo $UserName ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary pl-3 pr-3" value="Create">
                    </div>
                </form>
            </div>
            <!-- class content -->
        </div>
    </div>
</div>