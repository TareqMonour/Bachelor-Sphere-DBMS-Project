
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-th-list "></i></span> House Type</a>
				<a href="index.php?page=houses" class="nav-item nav-houses"><span class='icon-field'><i class="fa fa-home "></i></span> Houses</a>
				<a href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Tenants</a>
				<a href="index.php?page=lost_found" class="nav-item nav-lost_found"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Lost & Found</a>
				<a href="index.php?page=rickshaw_fare" class="nav-item nav-rickshaw_fare"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Rickshaw Fare Division</a>
				<a href="index.php?page=tuition_search" class="nav-item nav-tuition_search"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Tuition Searching</a>
				<a href="index.php?page=mess_management" class="nav-item nav-manage_mess"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Mess Management</a>
				<a href="index.php?page=invoices" class="nav-item nav-invoices"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> Payments</a>
				<a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Reports</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users "></i></span> Profile</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs text-danger"></i></span> System Settings</a> 
			<?php endif; ?>
			<a href="index.php?page=about" class="nav-item nav-about"><span class='icon-field'><i class="fa fa-list-alt "></i></span> About US</a>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
