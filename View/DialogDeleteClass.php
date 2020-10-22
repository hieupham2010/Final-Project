<div class="modal fade" id="DeleteClass<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Delete Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../Handle/DeleteClassProcess.php" method="POST">
                    <div class="form-group">
                        <p>Are you sure remove this class?</p>
                        <input type="hidden" class="form-control" id="ClassID" name="ClassID" value="<?php echo $row["ClassID"] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary pl-3 pr-3" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>