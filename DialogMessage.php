<?php require 'Handle/DialogMessageProcess.php' ?>
<div class="modal fade" id="Message" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MessageTitle"><?php echo $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $content ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary pl-3 pr-3" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>