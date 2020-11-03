<div class="modal fade" id="InvitePeople" tabindex="-1" role="dialog" aria-labelledby="InviteStudentTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="InviteStudentTitle">Invite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../Handle/InvitePeopleProcess" method="POST">
                    <input type="email" class="form-control" name="Email" placeholder="Enter email here" require>
                    <input type="hidden" class="form-control" name="encryptCode" value="<?php echo encryptClassCode($ClassID) ?>" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary-outline" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary pl-3 pr-3">Invite</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>