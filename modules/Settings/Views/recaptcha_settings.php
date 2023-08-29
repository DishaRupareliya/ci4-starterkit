<div class="form-group mb-3 ">
    <label class="form-label">Site Key</label>
    <div>
        <input type="text" class="form-control" placeholder="Enter Site Key" id="siteKey" name="siteKey" value="<?= get_option('siteKey'); ?>" required>
    </div>
</div>
<div class="form-group mb-3 ">
    <label class="form-label">Secret Key</label>
    <div >
        <input type="text" class="form-control" placeholder="Enter key" id="secretKey" name="secretKey" value="<?= get_option('secretKey'); ?>" required>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-check">
        <input class="form-check-input" type="checkbox">
        <span class="form-check-label">Enable with login</span>
    </label>
</div>