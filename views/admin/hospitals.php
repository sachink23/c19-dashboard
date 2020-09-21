<?php
$this->layout("admin/template", [
    "title" => "Hospital Management : "
]);
?>

<div class="row">
    <div class="col-12">
        <button  type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addHospitalModal">
            <i class="fa fa-plus"></i> Add Hospital
        </button>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addHospitalModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Add Hospital</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center h5 text-dark">Hospital Details</h2><hr />
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="hospital_name">Hospital Name</label>
                                <textarea class="form-control" placeholder="Hospital Name" name="hospital_name" id="hospital_name" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="hospital_type">Hospital Type</label>
                                <select class="form-control" name="hospital_type" id="hospital_type" required>
                                    <option value="">Select Hospital Type</option>
                                    <option value="CCC">CCC</option>
                                    <option value="DCH">DCH</option>
                                    <option value="DCHC">DCHC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="hospital_type">Gov / Private</label>
                                <select class="form-control" name="hospital_type" id="hospital_type" required>
                                    <option value="">Select Hospital Type</option>
                                    <option value="g">Government</option>
                                    <option value="p">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="hospital_type">Taluka</label>
                                <select class="form-control" name="hospital_type" id="hospital_type" required>
                                    <option value="">Select Subdistrict</option>
                                    <option value="Gangakhed">Gangakhed</option>
                                    <option value="Manwath">Manwath</option>
                                    <option value="Sailu">Sailu</option>
                                    <option value="Sonpeth">Sonpeth</option>
                                    <option value="Palam">Palam</option>
                                    <option value="Parbhani">Parbhani</option>
                                    <option value="Purna">Purna</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="hospital_add">Address</label>
                                <textarea class="form-control" placeholder="Hospital Address" name="hospital_add" id="hospital_add" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <h2 class="text-center h5 text-dark">Bed Capacity Details</h2><hr />
                        </div>
                        .col-md-4
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>