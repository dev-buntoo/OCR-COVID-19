<div class="modal fade" id="editStaffModal">
    <div class=" modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Paramedic Staff</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form id="updateStaff" staff="{{ $paramedicStaff->paramedic_staff_id }}">
                <div class="modal-body p-3">
                    @csrf
                    <div class="form-main-section">
                        <div class="card basicInfo">
                            <div class=" card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" name="name" id="name" class="form-control alphabets"
                                                required value="{{ $paramedicStaff->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone *</label>
                                            <input type="text" name="phone" id="phone" class="form-control numeric"
                                                required value="{{ $paramedicStaff->user->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Email *</label>
                                            <input type="email" name="email" id="email" class="form-control" required
                                                value="{{ $paramedicStaff->user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cnic">CNIC *</label>
                                            <input type="text" name="cnic" id="cnic" class="form-control numeric"
                                                required minlength="13" maxlength="13"
                                                value="{{ $paramedicStaff->user->cnic }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="dob">Date Of Birth *</label>
                                            <input type="date" name="dob" id="dob" class="form-control" required
                                                value="{{ Carbon\Carbon::parse($paramedicStaff->user->date_of_birth)->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender *</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="">Select Gender</option>
                                                <option value="1"
                                                    {{ $paramedicStaff->user->gender == 1 ? 'selected' : null }}>Male
                                                </option>
                                                <option value="2"
                                                    {{ $paramedicStaff->user->gender == 2 ? 'selected' : null }}>
                                                    Female
                                                </option>
                                                <option value="3"
                                                    {{ $paramedicStaff->user->gender == 3 ? 'selected' : null }}>Other
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Vaccination Center *</label>
                                            <select name="center" id="center" class="form-control" required>
                                                <option value="">Select Vaccination Center</option>
                                                @foreach ($vaccinationCenters as $center)
                                                    <option value="{{ $center->vaccination_center_id }}"
                                                        {{ $paramedicStaff->vaccination_center_id == $center->vaccination_center_id ? 'selected' : null }}>
                                                        {{ $center->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">City *</label>
                                            <input type="text" name="city" id="city" class="form-control alphabets"
                                                required value="{{ $paramedicStaff->city }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">State *</label>
                                            <input type="text" name="state" id="state" class="form-control alphabets"
                                                required value="{{ $paramedicStaff->state }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cnic">Address *</label>
                                            <textarea name="address" id="address" class="form-control" required
                                                minlength="10">{{ $paramedicStaff->address }}</textarea>
                                        </div>
                                    </div>
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
