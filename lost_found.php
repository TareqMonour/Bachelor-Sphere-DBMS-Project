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
                        <b>List of Lost and Found Items</b>
                        <span class="float:right">
                            <a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_lost_found">
                                <i class="fa fa-plus"></i> New Item
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="">Item Name</th>
                                    <th class="">Description</th>
                                    <th class="">Status</th>
                                    <th class="">Location</th>
                                    <th class="">Created_At</th>
                                    <!-- <th class="text-center">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $lost_and_found = $conn->query("SELECT * FROM lost_and_found ORDER BY created_at DESC");
                                while($row=$lost_and_found->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><?php echo $row['item_name'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo ucwords($row['status']) ?></td>
                                    <td><?php echo $row['location'] ?></td>
                                     <td><?php echo $row['created_at'] ?></td>
                                    <!-- <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary edit_lost_found" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
                                        <button class="btn btn-sm btn-outline-danger delete_lost_found" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
                                    </td> -->
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

    $('#new_lost_found').click(function(){
        uni_modal("New Lost and Found Item","manage_lost_found.php","mid-large");
    });

    $('.edit_lost_found').click(function(){
        uni_modal("Manage Lost and Found Item","manage_lost_found.php?id="+$(this).attr('data-id'),"mid-large");
    });

    $('.delete_lost_found').click(function(){
        _conf("Are you sure to delete this item?","delete_lost_found",[$(this).attr('data-id')]);
    });

    function delete_lost_found($id){
        start_load();
        $.ajax({
            url:'ajax.php?action=delete_lost_found',
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
