   {{-- update City Form Modal --}}
   <div class="modal fade" id="updateCityModal">
    <div class=" modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update City</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="updateCity" city="{{ $city->city_id }}">
                <div class="modal-body p-3">
                    @csrf
                    <div class="form-main-section">
                        <div class="card basicInfo">
                            <div class=" card-body">
                                <div class="form-group">
                                    <label for="name">Enter City Name *</label>
                                    <input type="text" name="name" id="name" class="form-control alphabets" value="{{ $city->name }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-success"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
