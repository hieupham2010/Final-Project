<div class="modal fade" id="CrClassWork" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle">Add ClassWork</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class content -->
            <div class="modal-body">
                <form action="../Handle/CreateClassProcess" method="POST">
                    <div class="form-group">
                        <label for="txtClassWorkTitle" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="txtClassWorkTitle" name="txtClassWorkTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="txtInstrucion" class="col-form-label">Instrucion</label>
                        <textarea type="text" class="form-control" id="txtInstrucion" name="txtInstrucion" required>
                    </div>
                    <!-- cai file chua log len nen chua biet de customize-->
					<div class="form-group">
					    <input type="file" class="form-control" id="txtRoomAdd" name="txtRoomAdd" required>
                    </div>
                    <!---->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Create</button>
						<input type="submit" class="btn btn-primary pl-3 pr-3" value="Create">
					</div>
				</form>
            </div>
            <!-- class content -->
		</div>
	</div>
</div>