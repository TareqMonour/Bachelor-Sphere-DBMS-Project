<?php  
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM rickshaw_fares where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
    $$k=$val;
}
}
?>
<div class="container-fluid">
    <form action="" id="manage-rickshaw-fare">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">License No</label>
                <input type="text" class="form-control" name="rickshaw_id" value="<?php echo isset($rickshaw_id) ? $rickshaw_id :'' ?>" required>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Route</label>
                <input type="text" class="form-control" name="route" value="<?php echo isset($route) ? $route :'' ?>" required>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Total Fare</label>
                <input type="number" class="form-control" name="total_fare" id="total_fare" value="<?php echo isset($total_fare) ? $total_fare :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Number of Passengers</label>
                <input type="number" class="form-control" name="num_passengers" id="num_passengers" value="<?php echo isset($num_passengers) ? $num_passengers :'' ?>" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Fare per Passenger</label>
                <input type="number" class="form-control" name="fare_per_passenger" id="fare_per_passenger" value="<?php echo isset($fare_per_passenger) ? $fare_per_passenger :'' ?>" readonly>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">From</label>
                <input type="text" class="form-control" name="from_location" value="<?php echo isset($from_location) ? $from_location :'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">To</label>
                <input type="text" class="form-control" name="to_location" value="<?php echo isset($to_location) ? $to_location :'' ?>" required>
            </div>
        </div>

            <div class="col-md-6">
                <label class="control-label">Status</label>
                <select name="status" class="custom-select" required>
                    <option value="available" <?php echo isset($status) && $status == 'available' ? 'selected' : '' ?>>Available</option>
                    <option value="unavailable" <?php echo isset($status) && $status == 'unavailable' ? 'selected' : '' ?>>Unavailable</option>
                </select>
            </div>
        </div>
    </form>
</div>

<script>
    // Function to update fare per passenger
    function updateFarePerPassenger() {
        let totalFare = document.getElementById('total_fare').value;
        let numPassengers = document.getElementById('num_passengers').value;
        let farePerPassengerField = document.getElementById('fare_per_passenger');

        if(totalFare > 0 && numPassengers > 0) {
            let farePerPassenger = totalFare / numPassengers;
            farePerPassengerField.value = farePerPassenger.toFixed(2); // Set value with 2 decimal places
        } else {
            farePerPassengerField.value = ''; // Clear field if inputs are not valid
        }
    }

    // Event listeners for changes to total fare or number of passengers
    document.getElementById('total_fare').addEventListener('input', updateFarePerPassenger);
    document.getElementById('num_passengers').addEventListener('input', updateFarePerPassenger);

    $('#manage-rickshaw-fare').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url:'ajax.php?action=save_rickshaw_fare',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    alert_toast("Rickshaw fare details saved successfully.",'success');
                    setTimeout(function(){
                        location.reload();
                    },1000);
                }
            }
        });
    });
</script>
