<?php include('db_connect.php');?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
                <!-- Add any additional content here -->
            </div>
        </div>
        <div class="row">
            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>List of Tuition Classes</b>
                        <span class="float:right">
                            <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tuition">
                                <i class="fa fa-plus"></i> New Tuition
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Subject</th>
                                    <th class="">Tutor Name</th>
                                    <th class="">Status</th>
                                    <th class="">Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $tuition = $conn->query("SELECT * FROM tuition ORDER BY created_at DESC");
                                while($row=$tuition->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                    <td><?php echo $row['tutor_name'] ?></td>
                                    <td><?php echo ucwords($row['status']) ?></td>
                                    <td><?php echo $row['created_at'] ?></td>
                                    
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>
    </div>
</div>

<style>
    td {
        vertical-align: middle !important;
    }
    td p {
        margin: unset
    }
</style>

<script>
    $(document).ready(function(){
        $('table').dataTable();
    });

    $('#new_tuition').click(function(){
        uni_modal("New Tuition Class","manage_tuition.php","mid-large");
    });

    $('.edit_tuition').click(function(){
        uni_modal("Manage Tuition Class","manage_tuition.php?id="+$(this).attr('data-id'),"mid-large");
    });

    $('.delete_tuition').click(function(){
        _conf("Are you sure to delete this class?","delete_tuition",[$(this).attr('data-id')]);
    });

    function delete_tuition($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_tuition',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("Data successfully deleted",'success');
                    setTimeout(function(){
                        location.reload();
                    },1500);
                }
            }
        });
    }
</script>
