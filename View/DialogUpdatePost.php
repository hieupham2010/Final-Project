<div class="modal fade" id="UpdatePost<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Update Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <form action="../Handle/UpdatePostProcess" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="md-textarea form-control" name="txtPost" rows="3"><?php echo $row["Message"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="PostID" value="<?php echo $row["PostID"]?>">
                        <input type="hidden" class="form-control" name="encryptCode" value="<?php echo encryptClassCode($ClassID) ?>" required>
                        <input type="file" name="fileUpload[]" id="inputGroupFile02" multiple />
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