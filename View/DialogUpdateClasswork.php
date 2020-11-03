<div class="modal fade" id="UpdateClasswork<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Update Classwork</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <form action="../Handle/UpdateClassworkProcess" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtClassworkTitle" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="txtClassworkTitle" name="txtClassworkTitle" value="<?php echo $row["Title"] ?>" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label for="txtDescription" class="col-form-label">Description</label>
                        <textarea class="form-control" id="txtDescription" rows="3" name="txtDescription" placeholder="Description"><?php echo $row["Description"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="fileUpload[]" id="inputGroupFile02" multiple />
                            <label class="custom-file-label text-truncate" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="ClassworkID" value="<?php echo $row["ClassworkID"] ?>">
                        <input type="hidden" class="form-control" name="encryptCode" value="<?php echo encryptClassCode($ClassID) ?>" required>
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