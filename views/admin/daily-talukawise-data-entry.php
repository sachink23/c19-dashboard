<?php
$this->layout("admin/template", [
    "title" => "Talukawise Data Entry : "
]);
?>
<form method="post" action="../backend/save-daily-talukawise.php">
    <div class="container my-2 py-2">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 text-center text-dark">Daily Talukawise Report</h1><hr />
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="form-group">
                    <label for="date">Report Date</label>
                    <input type="date" required
                           class="form-control" name="date" id="date" placeholder="">
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="form-group">
                    <label for="time">Report Time</label>
                    <input type="time" required
                           class="form-control" name="time" id="time" placeholder="">
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="form-group">
                    <label for="tests">Conducted Tests</label>
                    <input type="number" required
                           class="form-control" name="tests" id="tests" placeholder="">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid table-responsive">
    <table class="table table-bordered text-center bg-white">
        <thead class="thead-inverse bg-dark text-light">
        <tr>
            <th>Sr</th>
            <th>Taluka</th>
            <th>Positive</th>
            <th>Discharge</th>
            <th>Death</th>
            <th width="20%">Active</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">1</td>
                <td>Gangakhed</td>
                <td>
                    <input type="hidden" id="total_positive_gangakhed" value="<?= $talukas["gangakhed"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_gangakhed" value="<?= $talukas["gangakhed"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_gangakhed" value="<?= $talukas["gangakhed"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_gangakhed" value="<?= $talukas["gangakhed"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_gangakhed"
                               id="positive_gangakhed"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_gangakhed"
                               id="discharge_gangakhed"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_gangakhed"
                               id="death_gangakhed"
                               onchange="update()">
                    </div>
                </td>
                <td id="gangakhed_active_display"></td>
            </tr>
            <tr>
            <td scope="row">2</td>
            <td>Jintur</td>
            <td>
                <input type="hidden" id="total_positive_jintur" value="<?= $talukas["jintur"]["positive"] ?? 0 ?>">
                <input type="hidden" id="total_death_jintur" value="<?= $talukas["jintur"]["death"] ?? 0 ?>">
                <input type="hidden" id="total_discharge_jintur" value="<?= $talukas["jintur"]["discharge"] ?? 0 ?>">
                <input type="hidden" id="total_active_jintur" value="<?= $talukas["jintur"]["active"] ?? 0 ?>">
                <div class="form-group">
                    <input type="number"
                           class="form-control"
                           name="positive_jintur"
                           id="positive_jintur"
                           onchange="update()">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="number"
                           class="form-control"
                           name="discharge_jintur"
                           id="discharge_jintur"
                           onchange="update()">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="number"
                           class="form-control"
                           name="death_jintur"
                           id="death_jintur"
                           onchange="update()">
                </div>
            </td>
            <td id="jintur_active_display"></td>
        </tr>
            <tr>
                <td scope="row">3</td>
                <td>Manwath</td>
                <td>
                    <input type="hidden" id="total_positive_manwath" value="<?= $talukas["manwath"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_manwath" value="<?= $talukas["manwath"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_manwath" value="<?= $talukas["manwath"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_manwath" value="<?= $talukas["manwath"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_manwath"
                               id="positive_manwath"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_manwath"
                               id="discharge_manwath"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_manwath"
                               id="death_manwath"
                               onchange="update()">
                    </div>
                </td>
                <td id="manwath_active_display"></td>
            </tr>
            <tr>
                <td scope="row">4</td>
                <td>Selu</td>
                <td>
                    <input type="hidden" id="total_positive_selu" value="<?= $talukas["selu"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_selu" value="<?= $talukas["selu"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_selu" value="<?= $talukas["selu"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_selu" value="<?= $talukas["selu"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_selu"
                               id="positive_selu"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_selu"
                               id="discharge_selu"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_selu"
                               id="death_selu"
                               onchange="update()">
                    </div>
                </td>
                <td id="selu_active_display"></td>
            </tr>
            <tr>
                <td scope="row">5</td>
                <td>Sonpeth</td>
                <td>
                    <input type="hidden" id="total_positive_sonpeth" value="<?= $talukas["sonpeth"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_sonpeth" value="<?= $talukas["sonpeth"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_sonpeth" value="<?= $talukas["sonpeth"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_sonpeth" value="<?= $talukas["sonpeth"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_sonpeth"
                               id="positive_sonpeth"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_sonpeth"
                               id="discharge_sonpeth"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_sonpeth"
                               id="death_sonpeth"
                               onchange="update()">
                    </div>
                </td>
                <td id="sonpeth_active_display"></td>
            </tr>
            <tr>
                <td scope="row">6</td>
                <td>Palam</td>
                <td>
                    <input type="hidden" id="total_positive_palam" value="<?= $talukas["palam"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_palam" value="<?= $talukas["palam"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_palam" value="<?= $talukas["palam"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_palam" value="<?= $talukas["palam"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_palam"
                               id="positive_palam"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_palam"
                               id="discharge_palam"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_palam"
                               id="death_palam"
                               onchange="update()">
                    </div>
                </td>
                <td id="palam_active_display"></td>
            </tr>
            <tr>
                <td scope="row">7</td>
                <td>Parbhani</td>
                <td>
                    <input type="hidden" id="total_positive_parbhani" value="<?= $talukas["parbhani"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_parbhani" value="<?= $talukas["parbhani"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_parbhani" value="<?= $talukas["parbhani"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_parbhani" value="<?= $talukas["parbhani"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_parbhani"
                               id="positive_parbhani"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_parbhani"
                               id="discharge_parbhani"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_parbhani"
                               id="death_parbhani"
                               onchange="update()">
                    </div>
                </td>
                <td id="parbhani_active_display"></td>
            </tr>
            <tr>
                <td scope="row">8</td>
                <td>Pathri</td>
                <td>
                    <input type="hidden" id="total_positive_pathri" value="<?= $talukas["pathri"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_pathri" value="<?= $talukas["pathri"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_pathri" value="<?= $talukas["pathri"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_pathri" value="<?= $talukas["pathri"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_pathri"
                               id="positive_pathri"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_pathri"
                               id="discharge_pathri"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_pathri"
                               id="death_pathri"
                               onchange="update()">
                    </div>
                </td>
                <td id="pathri_active_display"></td>
            </tr>
            <tr>
                <td scope="row">9</td>
                <td>Purna</td>
                <td>
                    <input type="hidden" id="total_positive_purna" value="<?= $talukas["purna"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_purna" value="<?= $talukas["purna"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_purna" value="<?= $talukas["purna"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_purna" value="<?= $talukas["purna"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_purna"
                               id="positive_purna"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_purna"
                               id="discharge_purna"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_purna"
                               id="death_purna"
                               onchange="update()">
                    </div>
                </td>
                <td id="purna_active_display"></td>
            </tr>

            <tr>
                <td scope="row">10</td>
                <td>Other</td>
                <td>
                    <input type="hidden" id="total_positive_other" value="<?= $talukas["other"]["positive"] ?? 0 ?>">
                    <input type="hidden" id="total_death_other" value="<?= $talukas["other"]["death"] ?? 0 ?>">
                    <input type="hidden" id="total_discharge_other" value="<?= $talukas["other"]["discharge"] ?? 0 ?>">
                    <input type="hidden" id="total_active_other" value="<?= $talukas["other"]["active"] ?? 0 ?>">
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="positive_other"
                               id="positive_other"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="discharge_other"
                               id="discharge_other"
                               onchange="update()">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number"
                               class="form-control"
                               name="death_other"
                               id="death_other"
                               onchange="update()">
                    </div>
                </td>
                <td id="other_active_display"></td>
            </tr>
            <tr>
                <th colspan="2">Total</th>
                <td id="pos_tot_dis"></td>
                <td id="dis_tot_dis"></td>
                <td id="dea_tot_dis"></td>
                <td id="act_tot_dis"></td>
            </tr>
            <tr>
                <td colspan="6">
                    <button type="submit" class="btn btn-outline-primary float-right">Submit Data</button>
                </td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </table>
</div>

</form>
<script>
    function update() {
        var talukas = [
            "gangakhed",
            "jintur",
            "manwath",
            "selu",
            "sonpeth",
            "palam",
            "parbhani",
            "pathri",
            "purna",
            "other"
        ];
        var district_positive = 0;
        var district_death = 0;
        var district_discharge = 0;
        var district_active = 0;

        var current_positive = 0;
        var current_death = 0;
        var current_discharge = 0;

        for (let i = 0; i < talukas.length; i++) {
            var tal_pos = 0;
            var tal_dis = 0;
            var tal_death = 0;
            if (document.getElementById("positive_"+talukas[i]).value) {
                tal_pos = parseInt(document.getElementById("positive_"+talukas[i]).value);
            }
            if (document.getElementById("discharge_"+talukas[i]).value) {
                tal_dis = parseInt(document.getElementById("discharge_"+talukas[i]).value);
            }
            if (document.getElementById("death_"+talukas[i]).value) {
                tal_death = parseInt(document.getElementById("death_"+talukas[i]).value);
            }
            current_positive += tal_pos;
            current_discharge += tal_dis;
            current_death += tal_death;

            var taluka_total_positive = parseInt(document.getElementById("total_positive_"+talukas[i]).value) + tal_pos;

            var taluka_total_discharge = parseInt(document.getElementById("total_discharge_"+talukas[i]).value) + tal_dis;

            var taluka_total_death = parseInt(document.getElementById("total_death_"+talukas[i]).value) + tal_death;

            var taluka_active = taluka_total_positive - (taluka_total_death + taluka_total_discharge);

            document.getElementById("total_active_"+talukas[i]).value = taluka_active;

            document.getElementById(talukas[i] + "_active_display").innerText = taluka_active;

            district_positive += taluka_total_positive;
            district_death += taluka_total_death;
            district_discharge += taluka_total_discharge;
            district_active += taluka_active;



            if (taluka_active < 0) {

                alert("invalid input");
                return false;
            }
            if (taluka_total_positive < 0) {
                alert("invalid input");
                return false;
            }
            if (taluka_total_discharge < 0) {
                alert("invalid input");
                return false;
            }
            if (taluka_total_death< 0) {
                alert("invalid input");
                return false;
            }

        }

        document.getElementById("pos_tot_dis").innerText = current_positive;
        document.getElementById("dis_tot_dis").innerText = current_discharge;
        document.getElementById("dea_tot_dis").innerText = current_death;
        document.getElementById("act_tot_dis").innerText = district_active;

    }
    update();
</script>
