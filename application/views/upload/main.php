<div class="grid">
    <div class="col_12">
        <h3>Upload</h3>
    </div>
    <div class="col_12">
        <?php echo form_open_multipart('upload/do_upload');?>
        <input type="file" name="bestandFile" size="20"/>
        <input type="submit" value="upload" name="doUpload"/>
        </form>
    </div>
</div>