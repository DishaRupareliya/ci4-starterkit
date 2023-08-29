<div class="form-group mb-3">
    <div class="form-label">Activate Scroll Responsive Tables</div>
    <div>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tableResponsive" value="yes" <?php if(get_option('tableResponsive') == 'yes') { echo 'checked'; } ?>>
            <span class="form-check-label">Yes</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tableResponsive" value="no" <?php if(get_option('tableResponsive') == 'no') { echo 'checked'; } ?>>
            <span class="form-check-label">No</span>
        </label>
    </div>
</div>
<hr>
<div class="form-group mb-3">
    <div class="form-label">Show Table Export Button</div>
    <div>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tableExport" value="yes" <?php if(get_option('tableExport') == 'yes') { echo 'checked'; } ?>>
            <span class="form-check-label">Yes</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tableExport" value="no" <?php if(get_option('tableExport') == 'no') { echo 'checked'; } ?>>
            <span class="form-check-label">No</span>
        </label>
    </div>
</div>
<hr>
<div class="form-group mb-3 ">
    <label class="form-label">Tables Pagination Limit</label>
    <div >
        <input type="number" class="form-control" placeholder="Enter Limit" name="limit" id="limit" value="<?= get_option('limit'); ?>"required>
    </div>
</div>