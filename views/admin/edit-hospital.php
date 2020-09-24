<?php
$this->layout("admin/template", [
    "title" => "Edit Hospital Entry : "
]);
?>
<script>
    function deleteHospital() {
        let conf = confirm("This action will permanently delete hospital and related bed records!!!\n\nDo you confirm?")
        if (conf) {
            window.location.href = '../backend/delete-hospital.php?hid='+<?= $hospital["hospital_id"] ?>;
        }
    }
</script>
<div class="container">


<form method="post" action="../backend/full-edit-hospital.php?hid=<?= $hospital['hospital_id'] ?>" class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i> Modify Hospital</h5>
        <button onclick="deleteHospital()" type="button" class="btn btn-outline-danger">Delete Hospital</button>
    </div>
    <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="hospital_name">Hospital Name</label>
                        <textarea class="form-control" placeholder="Hospital Name" name="hospital_name" id="hospital_name" rows="2" required><?= $hospital["hospital_name"] ?></textarea>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-group">
                        <label for="hospital_type">Hospital Type</label>
                        <select class="form-control" name="hospital_type" id="hospital_type" required>
                            <option value="">Select Hospital Type</option>
                            <option <?= ($hospital["type"] === "CCC" ? "SELECTED":"") ?> value="CCC">CCC</option>
                            <option <?= ($hospital["type"] === "DCH" ? "SELECTED":"") ?> value="DCH">DCH</option>
                            <option <?= ($hospital["type"] === "DCHC" ? "SELECTED":"") ?> value="DCHC">DCHC</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-group">
                        <label for="hospital_gov_priv">Gov / Private</label>
                        <select class="form-control" name="hospital_gov_priv" id="hospital_gov_priv" required>
                            <option value="">Select Hospital Type</option>
                            <option  <?= ($hospital["is_gov"] ? "SELECTED":"") ?> value="g">Government</option>
                            <option <?= (!$hospital["is_gov"] ? "SELECTED":"") ?> value="p">Private</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="form-group">
                        <label for="hospital_subdist">Taluka</label>
                        <select class="form-control" name="hospital_subdist" id="hospital_subdist" required>
                            <option value="">Select Subdistrict</option>
                            <option <?= $hospital["taluka"] == "gangakhed" ? "SELECTED" : "" ?> value="gangakhed">Gangakhed</option>
                            <option <?= $hospital["taluka"] == "jintur" ? "SELECTED" : "" ?> value="jintur">Jintur</option>
                            <option <?= $hospital["taluka"] == "manwath" ? "SELECTED" : "" ?> value="manwath">Manwath</option>
                            <option <?= $hospital["taluka"] == "selu" ? "SELECTED" : "" ?> value="selu">Selu</option>
                            <option <?= $hospital["taluka"] == "sonpeth" ? "SELECTED" : "" ?> value="sonpeth">Sonpeth</option>
                            <option <?= $hospital["taluka"] == "palam" ? "SELECTED" : "" ?> value="palam">Palam</option>
                            <option <?= $hospital["taluka"] == "parbhani" ? "SELECTED" : "" ?> value="parbhani">Parbhani</option>
                            <option <?= $hospital["taluka"] == "pathri" ? "SELECTED" : "" ?> value="pathri">Pathri</option>
                            <option <?= $hospital["taluka"] == "purna" ? "SELECTED" : "" ?> value="purna">Purna</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="hospital_add">Address</label>
                        <textarea class="form-control" required placeholder="Hospital Address" name="hospital_add" id="hospital_add" rows="3"><?= $hospital["address"] ?></textarea>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" required
                               class="form-control" value="<?= $hospital["contact_person"] ?>" name="contact_person" id="contact_person" placeholder="Contact Person">
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" required
                               class="form-control" value="<?= $hospital["contact_number"] ?>" name="contact_number" id="contact_number" placeholder="Contact Number">
                    </div>
                </div>
                <div class="col-12">
                    <h2 class="text-center h5 text-dark">Bed Capacity Details</h2><hr />
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total_beds">Total Beds</label>
                        <input type="number" required value="<?= $hospital["number_of_beds"] ?>"
                               class="form-control" name="total_beds" id="total_beds" placeholder="Total Beds">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="o2_beds">O<sub>2</sub> Beds</label>
                        <input type="number" required value="<?= $hospital["number_of_o2_beds"] ?>"
                               class="form-control" name="o2_beds" id="o2_beds" placeholder="Oxygen Beds">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="vent_beds">Ventilator Beds</label>
                        <input type="number" required value="<?= $hospital["number_of_ventilator_beds"] ?>"
                               class="form-control" name="vent_beds" id="vent_beds" placeholder="Ventilator Beds">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary float-right">Modify</button>
    </div>
</form>

</div>