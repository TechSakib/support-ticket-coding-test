<div class="modal fade" id="ticketCloseModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Close Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="closingReason" class="form-label fw-bold">Closing Reason</label>
                        <textarea name="closing_reason" class="form-control" id="closingReason" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Close Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>
