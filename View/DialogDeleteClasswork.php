<div class="modal fade" id="DeleteClasswork<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Delete Classwork</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <p>Are you sure delete this classwork?</p>
                <form action="../Handle/DeleteClassworkProcess" method="POST">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="ClassworkID" value="<?php echo $row["ClassworkID"]?>">
                        <input type="hidden" class="form-control" name="encryptCode" value="<?php echo encryptClassCode($ClassID) ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary pl-3 pr-3" value="Delete">
                    </div>
                </form>
            </div>
            <!-- class content -->
        </div>
    </div>
</div>