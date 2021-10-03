    {{-- Add Center Form Modal --}}
    <div class="modal fade" id="updateCenterModal">
        <div class=" modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Vaccination Center</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form id="updateCenter" center="{{ $vaccinationCenter->vaccination_center_id }}">
                    <div class="modal-body p-3">
                        @csrf
                        <div class="form-main-section">
                            <div class="card basicInfo">
                                <div class=" card-body">
                                    <div class="form-group">
                                        <label for="name">Enter Name *</label>
                                        <input type="text" name="name" id="name" value="{{ $vaccinationCenter->name }}"
                                            class="form-control alphabets" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select City *</label>
                                        <select name="city" id="city" class=" form-control">
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }}"
                                                    {{ $vaccinationCenter->city_id == $city->city_id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Enter Address *</label>
                                        <textarea type="text" name="address" id="address" class="form-control"
                                            required>{{ $vaccinationCenter->address }}</textarea>
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
