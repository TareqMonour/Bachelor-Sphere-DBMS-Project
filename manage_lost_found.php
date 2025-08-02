<?php  
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM lost_and_found where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
}
?>
<div class="container-fluid">
    <form action="" id="manage-lost-found">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Item Name</label>
                <input type="text" class="form-control" name="item_name" value="<?php echo isset($item_name) ? $item_name :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Status</label>
                <select name="status" class="custom-select" required>
                    <option value="lost" <?php echo isset($status) && $status == 'lost' ? 'selected' : '' ?>>Lost</option>
                    <option value="found" <?php echo isset($status) && $status == 'found' ? 'selected' : '' ?>>Found</option>
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Description</label>
                <textarea class="form-control" name="description" required><?php echo isset($description) ? $description :'' ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="control-label">Location</label>
                <input type="text" class="form-control" name="location" value="<?php echo isset($location) ? $location :'' ?>" required>
            </div>
        </div>
    </form>
</div>
<script>
    $('#manage-lost-found').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url:'ajax.php?action=save_lost_found',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast("Lost/Found item saved successfully.",'success');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            }
        });
    });
</script>
