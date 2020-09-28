<?php
$this->layout("admin/template", [
    "title" => "District Wise : "
]);
?>

<div class="row">
    <div class="col-12">
        <h1 class="h3 text-dark">District Wise Daily Numbers</h1><hr />
    </div>
</div>
<form method="post" action="../backend/save-daily-districtwise.php">
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="form-group">
                <label for="date">Report Date</label>
                <input type="date" required
                       class="form-control" name="date" id="date" >
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group">
                <label for="time">Report Time</label>
                <input type="time" required
                       class="form-control" name="time" id="time" >
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="form-group">
                <label for="active">Active</label>
                <input type="number" disabled
                       class="form-control" name="active" id="active" >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="form-group">
                <label for="tests">Tests</label>
                <input type="number" required min="0"
                       class="form-control" name="tests" id="tests" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="form-group">
                <label for="positive">Positive</label>
                <input type="number" onchange="calculate()" required min="0"
                       class="form-control" name="positive" id="positive" placeholder="">
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="form-group">
                <label for="discharge">Discharge</label>
                <input type="number" onchange="calculate()" required min="0"
                       class="form-control" name="discharge" id="discharge" placeholder="">
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="form-group">
                <label for="death">Death</label>
                <input type="number" onchange="calculate()" required min="0"
                       class="form-control" name="death" id="death" placeholder="">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary float-right py-2">Submit</button>
        </div>
    </div>
</form>
<div class="container-fluid table-responsive my-4">
    <table class="table table-bordered text-center table-inverse">
        <thead class="thead-inverse">
        <tr>
            <th>Date Time</th>
            <th>Conducted Tests</th>
            <th>Positive</th>
            <th>Discharge</th>
            <th>Death</th>
            <th>Active</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $pos = 0;
            $dis = 0;
            $death = 0;
            $active = 0;
            foreach ($reports as $report):
                $pos += $report["positive"];
                $dis += $report["discharge"];
                $death += $report["death"];
                $active += $pos - $dis -$death;

                ?>
        <tr>
            <td><?= date("d/m/y h:i A", strtotime($report["updated_on"])) ?></td>
            <td><?= $report["tests"] ?></td>
            <td><?= $report["positive"] ?></td>
            <td><?= $report["discharge"] ?></td>
            <td><?= $report["death"] ?></td>
            <td><?= $active ?></td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function calculate() {
        var positive = <?= $pos ?>;
        var discharge = <?= $dis ?>;
        var death = <?= $death ?>;

        if (document.getElementById("positive").value) {
            positive += parseInt(document.getElementById("positive").value);
        }
        if (document.getElementById("discharge").value) {
            discharge += parseInt(document.getElementById("discharge").value);
        }
        if (document.getElementById("death").value) {
            death += parseInt(document.getElementById("death").value)
        }

        var active = positive - discharge - death;

        document.getElementById("active").value = active;
        if (active < 0) {
            alert("Invalid Input!")
        }
    }
</script>