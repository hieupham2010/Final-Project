<div class="modal fade" id="JoinClass" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Join Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../Handle/JoinClassProcess" method="POST">
                    <div class="form-group">
                        <p>Ask your teacher class code, and enter it here</p>
                        <input type="text" class="form-control" id="JoinClassID" name="JoinClassID" placeholder="Enter class code">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary pl-4 pr-4" value="Join">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>