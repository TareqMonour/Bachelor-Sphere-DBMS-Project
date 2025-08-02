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
                        <b>List of Rickshaw Fares</b>
                        <span class="float:right">
                            <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_rickshaw_fare">
                                <i class="fa fa-plus"></i> New Fare
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">License Number</th>
                                    <th class="">Route</th>
                                    <th class="">Total Fare</th>
                                    <th class="">Fare per Passenger</th>
                                    <th class="">Status</th>
                                    <th class="">Created_At</th>
                                    <!-- <th class="text-center">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $rickshaw_fares = $conn->query("SELECT * FROM rickshaw_fares ORDER BY created_at DESC");
                                while($row=$rickshaw_fares->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><?php echo $row['license_number'] ?></td> 
                                    <td><?php echo $row['route'] ?></td>
                                    <td><?php echo number_format($row['total_fare'], 2) ?></td>
                                    <td><?php echo number_format($row['fare_per_passenger'], 2) ?></td>
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

    $('#new_rickshaw_fare').click(function(){
        uni_modal("New Rickshaw Fare","manage_rickshaw_fare.php","mid-large");
    });

    $('.edit_rickshaw_fare').click(function(){
        uni_modal("Manage Rickshaw Fare","manage_rickshaw_fare.php?id="+$(this).attr('data-id'),"mid-large");
    });

    $('.delete_rickshaw_fare').click(function(){
        _conf("Are you sure to delete this fare?","delete_rickshaw_fare",[$(this).attr('data-id')]);
    });

    function delete_rickshaw_fare($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_rickshaw_fare',
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
