<?php  
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM tuition where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
}
?>
<div class="container-fluid">
    <form action="" id="manage-tuition">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" value="<?php echo isset($subject) ? $subject :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Tutor Name</label>
                <input type="text" class="form-control" name="tutor_name" value="<?php echo isset($tutor_name) ? $tutor_name :'' ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="control-label">Fee</label>
                <input type="number" class="form-control" name="fee" value="<?php echo isset($fee) ? $fee :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo isset($start_date) ? date("Y-m-d", strtotime($start_date)) :'' ?>" required>
            </div>
        </div>
    </form>
</div>
<script>
    $('#manage-tuition').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url:'ajax.php?action=save_tuition',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast("Tuition details saved successfully.",'success');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            }
        });
    });
</script>
