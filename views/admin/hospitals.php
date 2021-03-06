<?php
$this->layout("admin/template", [
    "title" => "Hospital Management : "
]);
?>

<div class="row">
    <div class="col-12">
        <script>
            function clearTiming() {
                var allDateElems = document.getElementsByClassName("default_date");
                var allTimeElems = document.getElementsByClassName("default_time");
                var dt = new Date();

                for (let i = 0; i < allDateElems.length; i++) {
                    allDateElems[i].value = "<?= date("Y-m-d", time()) ?>"
                }

                for (let i = 0; i < allTimeElems.length; i++) {
                    allTimeElems[i].value = "18:00";
                }
            }
        </script>

        <button  type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#addHospitalModal">
            <i class="fa fa-plus"></i> Add Hospital
        </button>
    </div>
</div>
<div class="row my-2">
    <div class="col-12 table-responsive">
        <table class="table table-bordered text-center">
            <thead class="thead-inverse">
            <tr>
                <th>Sr No.</th>
                <th>Hospital Name</th>
                <th>Type</th>
                <th>Gov/Pvt</th>
                <th>Total Beds</th>
                <th>Occupied Beds</th>
                <th>Available Beds</th>
                <th>Updated On</th>
                <th>Update Beds</th>
                <th>Modify</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($hospitals as $hospital):?>
                <form method="post" action="../backend/edit-hospital.php">
                    <input type="hidden" name="hid" value="<?= $hospital["hospital_id"] ?>"
                    <tr>

                        <td><?= ++$i ?></td>
                        <td><?= $hospital["hospital_name"] ?></td>
                        <td><?= $hospital["type"] ?></td>
                        <td><?= $hospital["is_gov"] == 1 ? "GOV":"PVT" ?></td>
                        <td><?= $hospital["number_of_beds"] ?></td>
                        <td>
                            <div class="form-group">
                                <input type="number"
                                       onchange="document.getElementById('ava_<?= $hospital["hospital_id"] ?>').value = <?= $hospital["number_of_beds"] ?> - parseInt(document.getElementById('occ_<?= $hospital["hospital_id"] ?>').value)"
                                       class="form-control" name="occ_<?= $hospital["hospital_id"] ?>" id="occ_<?= $hospital["hospital_id"] ?>"  value="<?= $hospital["number_of_occ_beds"] ?>">
                            </div>
                        </td>
                        <td>
                            <input type="number" disabled
                                   class="form-control" id="ava_<?= $hospital["hospital_id"] ?>" name="ava_<?= $hospital["hospital_id"] ?>" value="<?= $hospital["number_of_beds"] - $hospital["number_of_occ_beds"] ?>">

                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date"
                                       class="form-control default_date" name="date_<?= $hospital["hospital_id"] ?>" value="<?= date("Y-m-d", strtotime($hospital["updated_on"])) ?>">
                            </div>
                            <div class="form-group">
                                <input type="time"
                                       class="form-control default_time" name="time_<?= $hospital["hospital_id"] ?>" value="<?= date("H:i", strtotime($hospital["updated_on"])) ?>">
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-primary">Update Beds</button>
                        </td>
                        <td>
                            <a role="button" href="./?path=edit-hospital&hid=<?= $hospital["hospital_id"] ?>" class="btn btn-outline-primary">Modify</a>
                        </td>
                    </tr>

                </form>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
<script>
    function report() {

    }
</script>
<!-- Modal -->
<div class="modal fade" id="addHospitalModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="../backend/create-hospital.php" class="modal-content">
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
                            <div class="form-group">
                                <label for="hospital_name">Hospital Name</label>
                                <textarea class="form-control" placeholder="Hospital Name" name="hospital_name" id="hospital_name" rows="2" required></textarea>
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
                                <label for="hospital_gov_priv">Gov / Private</label>
                                <select class="form-control" name="hospital_gov_priv" id="hospital_gov_priv" required>
                                    <option value="">Select Hospital Type</option>
                                    <option value="g">Government</option>
                                    <option value="p">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="hospital_subdist">Taluka</label>
                                <select class="form-control" name="hospital_subdist" id="hospital_subdist" required>
                                    <option value="">Select Subdistrict</option>
                                    <option value="gangakhed">Gangakhed</option>
                                    <option value="jintur">Jintur</option>
                                    <option value="manwath">Manwath</option>
                                    <option value="selu">Selu</option>
                                    <option value="sonpeth">Sonpeth</option>
                                    <option value="palam">Palam</option>
                                    <option value="parbhani">Parbhani</option>
                                    <option value="pathri">Pathri</option>
                                    <option value="purna">Purna</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="hospital_add">Address</label>
                                <textarea class="form-control" required placeholder="Hospital Address" name="hospital_add" id="hospital_add" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" required
                                       class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person">
                            </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" required
                                       class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="col-12">
                            <h2 class="text-center h5 text-dark">Bed Capacity Details</h2><hr />
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_beds">Total Beds</label>
                                <input type="number" required
                                       class="form-control" name="total_beds" id="total_beds" placeholder="Total Beds">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="o2_beds">O<sub>2</sub> Beds</label>
                                <input type="number" required
                                       class="form-control" name="o2_beds" id="o2_beds" placeholder="Oxygen Beds">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="vent_beds">Ventilator Beds</label>
                                <input type="number" required
                                       class="form-control" name="vent_beds" id="vent_beds" placeholder="Ventilator Beds">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary float-right">Create</button>
                <button type="reset" class="btn btn-danger float-left" data-dismiss="modal">Cancel</button>

            </div>
        </form>
    </div>
</div>
<script>

    clearTiming();
</script>
