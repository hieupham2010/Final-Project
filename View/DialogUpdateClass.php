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
                <form action="../Handle/UpdateClassProcess" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtClassNameUD" class="col-form-label">Class Name</label>
                        <input type="text" class="form-control" id="txtClassNameUD" name="txtClassNameUD" value="<?php echo $row["ClassName"]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="txtSubjectNameUD" class="col-form-label">Subject</label>
                        <input type="text" class="form-control" id="txtSubjectNameUD" name="txtSubjectNameUD" value="<?php echo $row["SubjectName"] ?>"required>
                    </div>
                    <div class="form-group">
                        <label for="txtRoomUD" class="col-form-label">Room</label>
                        <input type="text" class="form-control" id="txtRoomUD" name="txtRoomUD" value="<?php echo $row["Room"] ?>"required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="UDClassID" name="UDClassID" value="<?php echo $row["ClassID"] ?>"required>
                    </div>
                    <div class="form-group mt-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="imageUpload" id="inputGroupFile02"/>
                            <label class="custom-file-label text-truncate" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <script src="javascript/main.js"></script>
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