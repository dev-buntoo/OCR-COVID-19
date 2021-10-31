    {{-- Citizen Detail Modal --}}
    <div class="modal fade" id="confirm-citizen-modal">
        <div class=" modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Citizen Detail</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form id="confirm-citizen-form">
                    @csrf
                    <input type="hidden" name="passcode" value="{{ $citizen->passcode }}">
                    <div class="modal-body p-3">
                        @csrf
                        <div class="form-main-section">
                            <div class="card basicInfo">
                                <div class=" card-body">
                                    <div class="row my-2">
                                        <div class="col-6">Name</div>
                                        <div class="col-6">{{ $citizen->name }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">CNIC</div>
                                        <div class="col-6">{{ $citizen->user->cnic }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">Date Of Birth</div>
                                        <div class="col-6">{{ $citizen->user->date_of_birth }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">Passcode</div>
                                        <div class="col-6">{{ $citizen->passcode }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="confirm-citizen-form-response"></div>
                    <div class=" modal-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-success verify-citizen-button"> Confirm </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
