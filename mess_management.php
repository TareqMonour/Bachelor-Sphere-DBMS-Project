<?php include('db_connect.php'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
                <!-- Optional content here -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <b>List of Messes</b>
                        <span class="float-right">
                            <a class="btn btn-success btn-sm" href="javascript:void(0)" id="new_mess">
                                <i class="fa fa-plus"></i> New Mess
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover" id="messTable">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Mess Name</th>
                                    <th>Manager Name</th>
                                    <th>Status</th>
                                    <th>Capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $messes = $conn->query("SELECT * FROM mess_management ORDER BY created_at DESC");
                                while($row = $messes->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><?php echo $row['mess_name'] ?></td>
                                    <td><?php echo $row['manager_name'] ?></td>
                                    <td><?php echo ucwords($row['status']) ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Section for Items and Meal Costs -->
            <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <b>Bazar Items and Meal Costs</b>
            <span class="float-right">
                            <a class="btn btn-primary btn-sm" href="javascript:void(0)" id="new_bazar">
                                <i class="fa fa-plus"></i> New Bazar
                            </a>
                        </span>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="bazarTable">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Cumulative Cost</th>
                        <th>Cumulative Meal Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_bazar_cost = 0;
                    $cumulative_cost = 0;
                    $bazar_query = $conn->query("SELECT item_name, price FROM bazar_list");

                    // Calculate total meals for later use in calculating the meal rate
                    $meal_count = $conn->query("SELECT COUNT(*) as total_meal FROM assigned_meals")->fetch_assoc()['total_meal'];
                    
                    // Loop through each bazar item to display its price and cumulative costs
                    while ($bazar_row = $bazar_query->fetch_assoc()) {
                        $total_bazar_cost += $bazar_row['price'];
                        $cumulative_cost += $bazar_row['price'];
                        
                        // Calculate the cumulative meal rate (price / total meals)
                        $cumulative_meal_rate = $meal_count > 0 ? number_format($cumulative_cost / $meal_count, 2) : "N/A";

                        // Display each bazar item with its price and cumulative values
                        echo "<tr>";
                        echo "<td>{$bazar_row['item_name']}</td>";
                        echo "<td>{$bazar_row['price']}</td>";
                        echo "<td>{$cumulative_cost} </td>";
                        echo "<td>{$cumulative_meal_rate} </td>";
                        echo "</tr>";
                    }

                    // Displaying Total Bazar Cost and Meal Rate in bold
                    $total_meal_rate = $meal_count > 0 ? number_format($total_bazar_cost / $meal_count, 2) : "N/A";
                    echo "<tr>";
                    echo "<td colspan='2' class='text-right'><strong>Total Bazar Cost</strong></td>";
                    echo "<td><strong>{$total_bazar_cost} </strong></td>";
                    echo "<td><strong>{$total_meal_rate} </strong></td>";
                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


        <!-- Updated Section for Users and Day-Wise Meal Counts -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Users and Day-Wise Meal Counts</b>
                           <span class="float-right">
                           <a class="btn btn-success btn-sm" href="javascript:void(0)" id="assign_meal_btn">
                                <i class="fa fa-utensils"></i> Assign Meal
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover" id="userMealTable">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Mess</th>
                                    <th>Day-Wise Meal Count</th>
                                    <th>Total Meal Count</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Fetch all users with their day-wise meal counts across all messes
                                $users_query = $conn->query("SELECT u.id, u.username FROM users u");
                                while ($user = $users_query->fetch_assoc()) {
                                    $user_id = $user['id'];

                                    // Fetch meal counts for each user, grouped by date and mess
                                    $meal_count_query = $conn->query("SELECT m.mess_name, COUNT(am.id) as day_meal_count, am.assigned_date FROM assigned_meals am JOIN mess_management m ON am.mess_id = m.id WHERE am.user_id = $user_id GROUP BY m.mess_name, am.assigned_date ORDER BY am.assigned_date");
                                    
                                    // Calculate total meal count for the user
                                    $total_meal_count = $conn->query("SELECT COUNT(id) as total_meal FROM assigned_meals WHERE user_id = $user_id")->fetch_assoc()['total_meal'];

                                    while ($meal_row = $meal_count_query->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$user['username']}</td>";
                                        echo "<td>{$meal_row['mess_name']}</td>";
                                        echo "<td>{$meal_row['day_meal_count']}</td>";
                                        echo "<td>{$total_meal_count}</td>";
                                        echo "<td>{$meal_row['assigned_date']}</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal for Assigning Meals -->
<div class="modal fade" id="assign_meal_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="assign_meal_form" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Meal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Mess</label>
                        <select name="mess_id" class="form-control" required>
                            <?php
                            $messOptions = $conn->query("SELECT id, mess_name FROM mess_management");
                            while ($mess = $messOptions->fetch_assoc()): ?>
                            <option value="<?php echo $mess['id']; ?>"><?php echo $mess['mess_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select User</label>
                        <select name="user_id" class="form-control" required>
                            <?php
                            $userOptions = $conn->query("SELECT id, username FROM users");
                            while ($user = $userOptions->fetch_assoc()): ?>
                            <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Meals</label>
                        <select name="meal_id[]" class="form-control" multiple required>
                            <?php
                            $mealOptions = $conn->query("SELECT id, meal_name FROM meals");
                            while ($meal = $mealOptions->fetch_assoc()): ?>
                            <option value="<?php echo $meal['id']; ?>"><?php echo $meal['meal_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Assign Date</label>
                        <input type="date" name="assigned_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Assign Meal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Managing Mess -->
<div class="modal fade" id="manage_mess_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="manage_mess_form" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">New Mess</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mess Name</label>
                        <input type="text" name="mess_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Manager Name</label>
                        <input type="text" name="manager_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" name="capacity" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Adding Bazar Items -->
<div class="modal fade" id="new_bazar_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="new_bazar_form" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">New Bazar Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Purchase Date</label>
                        <input type="date" name="purchase_date" class="form-control" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Bazar Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script section for handling form submission and other functionalities -->
<script>
$(document).ready(function() {
    $('#new_mess').click(function() {
        $('#manage_mess_modal').modal('show');
    });

    $('#new_bazar').click(function() {
        $('#new_bazar_modal').modal('show');
    });

    $('#assign_meal_btn').click(function() {
        $('#assign_meal_modal').modal('show');
    });

    $(document).ready(function() {
    // Search functionality for List of Messes
    $('#messSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#messTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Search functionality for Bazar Items
    $('#bazarSearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#bazarTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Initialize modals for adding new Mess and Bazar Item
    $('#new_mess').click(function() {
        $('#manage_mess_modal').modal('show');
    });

    $('#new_bazar').click(function() {
        $('#new_bazar_modal').modal('show');
    });

    $('#assign_meal_btn').click(function() {
        $('#assign_meal_modal').modal('show');
    });
});

    // Add more JavaScript/jQuery functionalities as needed
});
</script>

