<?php  
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM bazar_list where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
}
?>
<div class="container-fluid">
    <form action="" id="manage-mess">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Item Name</label>
                <input type="text" class="form-control" name="item_name" value="<?php echo isset($item_name) ? $item_name :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Price</label>
                <input type="number" class="form-control" name="price" value="<?php echo isset($price) ? $price :'' ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="control-label">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" value="<?php echo isset($purchase_date) ? date("Y-m-d", strtotime($purchase_date)) :'' ?>" required>
            </div>
        </div>
    </form>
</div>
<script>
    $('#manage-mess').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url:'ajax.php?action=save_mess',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast("Mess details saved successfully.",'success');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            }
        });
    });
</script>
