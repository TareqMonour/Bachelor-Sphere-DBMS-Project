<?php include 'db_connect.php' ?>
<style>
span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    top: 0;
}
.imgs{
    margin: .5em;
    max-width: calc(100%);
    max-height: calc(100%);
}
.imgs img{
    max-width: calc(100%);
    max-height: calc(100%);
    cursor: pointer;
}
#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
    height: 60vh !important;background: black;
}
#imagesCarousel .carousel-item.active{
    display: flex !important;
}
#imagesCarousel .carousel-item-next{
    display: flex !important;
}
#imagesCarousel .carousel-item img{
    margin: auto;
}
#imagesCarousel img{
    width: auto!important;
    height: auto!important;
    max-height: calc(100%)!important;
    max-width: calc(100%)!important;
}
</style>

<div class="container-fluid">
    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome ". $_SESSION['login_name'].""  ?>
                    <hr>
                    <div class="row">
                        <!-- Existing Features -->
                        <div class="col-md-4 mb-3">
                            <div class="card border-primary">
                                <div class="card-body bg-primary">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-home "></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM houses")->num_rows ?>
                                        </b></h4>
                                        <p><b>Total Houses</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=houses" class="text-primary float-right">View Houses <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-warning">
                                <div class="card-body bg-warning">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-user-friends "></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM tenants where status = 1 ")->num_rows ?>
                                        </b></h4>
                                        <p><b>Total Tenants</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=tenants" class="text-primary float-right">View Tenants <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-success">
                                <div class="card-body bg-success">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-file-invoice "></i></span>
                                        <h4><b>
                                            <?php 
                                             $payment = $conn->query("SELECT sum(amount) as paid FROM payments where date(date_created) = '".date('Y-m-d')."' "); 
                                             echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'],2) : 0;
                                             ?>
                                        </b></h4>
                                        <p><b>Payments This Month</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=invoices" class="text-primary float-right">View Payments <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- New Features -->
                        <div class="col-md-4 mb-3">
                            <div class="card border-info">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-book "></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM tuition WHERE status = 'available'")->num_rows ?>
                                        </b></h4>
                                        <p><b>Available Tuitions</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=tuition_search" class="text-primary float-right">View Tuitions <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-dark">
                                <div class="card-body bg-dark">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-car "></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM rickshaw_fares WHERE status = 'available'")->num_rows ?>
                                        </b></h4>
                                        <p><b>Available Rickshaw Offers</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=rickshaw_fare" class="text-primary float-right">View Rickshaws <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-danger">
                                <div class="card-body bg-danger">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-search "></i></span>
                                        <h4><b>
                                        <?php echo $conn->query("SELECT * FROM lost_and_found WHERE status IN ('lost', 'found')")->num_rows ?>
                                        </b></h4>
                                        <p><b>Lost & Found Items</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=lost_found" class="text-primary float-right">View Items <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-secondary">
                                <div class="card-body bg-secondary">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"> <i class="fa fa-utensils "></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM mess_management WHERE status = 'active'")->num_rows ?>
                                        </b></h4>
                                        <p><b>Mess Management</b></p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="index.php?page=mess_management" class="text-primary float-right">View Summary <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>              
        </div>
    </div>
</div>
<script>
$('#manage-records').submit(function(e){
    e.preventDefault()
    start_load()
    $.ajax({
        url:'ajax.php?action=save_track',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success:function(resp){
            resp=JSON.parse(resp)
            if(resp.status==1){
                alert_toast("Data successfully saved",'success')
                setTimeout(function(){
                    location.reload()
                },800)
            }
        }
    })
})
$('#tracking_id').on('keypress',function(e){
    if(e.which == 13){
        get_person()
    }
})
$('#check').on('click',function(e){
    get_person()
})

function get_person(){
    start_load()
    $.ajax({
        url:'ajax.php?action=get_pdetails',
        method:"POST",
        data:{tracking_id : $('#tracking_id').val()},
        success:function(resp){
            if(resp){
                resp = JSON.parse(resp)
                if(resp.status == 1){
                    $('#name').html(resp.name)
                    $('#address').html(resp.address)
                    $('[name="person_id"]').val(resp.id)
                    $('#details').show()
                    end_load()
                }else if(resp.status == 2){
                    alert_toast("Unknown tracking id.",'danger');
                    end_load();
                }
            }
        }
    })
}
</script>
