<div class="modal fade" id="UpdateClass<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Update Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <form action="../Handle/UpdateClassProcess.php" method="POST">
                    <div class="form-group">
                        <label for="txtClassName" class="col-form-label">Class Name</label>
                        <input type="text" class="form-control" id="txtClassName" name="txtClassName" value="<?php echo $row["ClassName"]?>">
                    </div>
                    <div class="form-group">
                        <label for="txtSubjectName" class="col-form-label">Subject</label>
                        <input type="text" class="form-control" id="txtSubjectName" name="txtSubjectName" value="<?php echo $row["SubjectName"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="txtRoom" class="col-form-label">Room</label>
                        <input type="text" class="form-control" id="txtRoom" name="txtRoom" value="<?php echo $row["Room"] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="ClassID" name="ClassID" value="<?php echo $row["ClassID"] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary pl-3 pr-3" value="Update">
                    </div>
                </form>
            </div>
            <!-- class content -->
        </div>
    </div>
</div>