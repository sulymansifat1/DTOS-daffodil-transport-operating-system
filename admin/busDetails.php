<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

adminLogin();

$sql = "SELECT * FROM BusSchedule";
$result = mysqli_query($con, $sql);
?>
    <?php require('inc/link.php') ?>
    <?php require('inc/head.php'); ?>
    <div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
     
  
<?php require('inc/loader.php') ?>

      
<div class="container p-2 mx-auto sm:p-4">
	<h2 class="mb-4 text-2xl font-semibold leadi">Bus Schedule</h2>
	<div class="overflow-x-auto">
		<table class="min-w-full text-xs">
			<colgroup>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col>
				<col class="w-24">
			</colgroup>
			<thead class="bg-green-200">
				<tr class="text-left">
					<th class="p-3">Bus Name</th>
					<th class="p-3">Bus Number</th>
					<th class="p-3">Departure Point</th>
					<th class="p-3">Start Time</th>
					<th class="p-3">Stop Points</th>
					<th class="p-3">Stop Points Time</th>
					<th class="p-3">Arrival Point</th>
					<th class="p-3">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<tr class="border-b border-opacity-20 bg-green-100">
						<td class="p-3"><?php echo $row['bus_name']; ?></td>
						<td class="p-3"><?php echo $row['bus_number']; ?></td>
						<td class="p-3"><?php echo $row['departure_point']; ?></td>
						<td class="p-3"><?php echo $row['start_time']; ?></td>
						<td class="p-3"><?php echo $row['stop_points']; ?></td>
						<td class="p-3"><?php echo $row['stop_points_time']; ?></td>
						<td class="p-3"><?php echo $row['arrival_point']; ?></td>
						<td class="p-3 text-right">
							<a href="delete.php?id=<?php echo $row['id']; ?>" class="px-3 py-1 text-white font-semibold rounded-md bg-green-500 hover:bg-green-600" onclick="return confirm('Are you sure you want to delete this bus schedule?')">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
   </div>