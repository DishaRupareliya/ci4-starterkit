<div class="form-group mb-3">
    <div class="form-label">Activate Scroll Responsive Tables</div>
    <div>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="res_table" value="yes" <?= (get_option('res_table') == 'yes') ? 'checked' : 'checked' ?>>
            <span class="form-check-label">Yes</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="res_table" value="no" <?= (get_option('res_table') == 'no') ? 'checked' : '' ?>>
            <span class="form-check-label">No</span>
        </label>
    </div>
</div>
<hr>
<div class="form-group mb-3">
    <div class="form-label">Show Table Export Button</div>
    <div>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="table_export_btn" value="yes" <?= (get_option('table_export_btn') == 'yes') ? 'checked' : 'checked' ?> <?php if(get_option('table_export_btn') == 'yes') { echo 'checked'; } ?>>
            <span class="form-check-label">Yes</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="table_export_btn" value="no" <?= (get_option('table_export_btn') == 'no') ? 'checked' : '' ?>>
            <span class="form-check-label">No</span>
        </label>
    </div>
</div>
<hr>
<div class="form-group mb-3 ">
    <label class="form-label">Tables Pagination Limit</label>
    <div >
        <input type="number" class="form-control" placeholder="Enter Limit" name="tables_pagination_limit" id="tables_pagination_limit" value="<?= get_option('tables_pagination_limit'); ?>"required>
    </div>
</div>