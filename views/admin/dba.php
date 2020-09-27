<?php
$this->layout("admin/template", [
    "title" => "DBA : "
]);
?>
<form method="post" class="container-fluid mb-3" action="">

    <div class="form-group">
        <label for="query">Query</label>
        <textarea class="form-control" name="query" id="query" rows="3"><?= $query ?></textarea>
    </div>
    <button type="submit" class="btn float-right btn-outline-primary">Execute Query</button>
</form>
<?php if (count($data) > 0): ?>
<div class="container-fluid table-responsive">
    <br />
    <table class="table table-bordered py-2">
        <thead class="thead-inverse bg-dark text-light">
        <tr>
            <?php foreach ($data[0] as $field_name => $val): ?>
                <th><?= $field_name ?></th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $data_): ?>
            <tr>
                <?php foreach ($data_ as $d => $v): ?>
                    <td><?= $v ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php unset($_SESSION["Q_DATA"]); endif; ?>
