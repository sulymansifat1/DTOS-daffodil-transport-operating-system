<?php require('inc/link.php') ?>

<?php

$fromLocation = '';
$toLocation = '';




if (!empty($_GET['fromLocation']) && !empty($_GET['toLocation'])) {
     $fromLocation = $_GET['fromLocation'];
    $toLocation = $_GET['toLocation'];

    $sql = "SELECT `id`, `bus_name`, `bus_number`, `departure_point`, `start_time`, `stop_points`, `stop_points_time`, `arrival_point`
            FROM `busschedule`
            WHERE `departure_point` = ? AND `arrival_point` = ?";
    $values = [$fromLocation, $toLocation];
    $datatypes = "ss";
    $result = select($sql, $values, $datatypes);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $schedules[] = array(
                'id' => $row['id'],
                'bus_name' => $row['bus_name'],
                'bus_number' => $row['bus_number'],
                'departure_point' => $row['departure_point'],
                'departure_time' => date('h:i A', strtotime($row['start_time'])),
                'stop_points' => explode(',', $row['stop_points']),
                'stop_points_time' => explode(',', $row['stop_points_time']),
                'arrival_point' => $row['arrival_point']
            );
        }
    } else {
        $error_message = "No schedules found for the selected route.";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <?php require('inc/loader.php') ?>

</head>
<body>
<?php require('./inc/header.php'); ?>
<div class="pt-24 pb-0 flex items-center justify-center text-green-500">
<h1  class=" text-center text-2xl font-bold ">Search Again</h1>
<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z"></path></svg>
</div>
<div class="pt-0">
<?php require('./inc/search.php'); ?>

</div>



    <div class="md:pt-2 pb-10 md:pb-12 container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center my-8">Search Results</h2>

        <?php if (!empty($error_message)) : ?>
            <p class="text-center mt-4 text-gray-600"><?php echo $error_message; ?></p>
        <?php elseif (!empty($schedules)) : ?>
            <div class="space-y-4">
                <?php foreach ($schedules as $schedule) : ?>
                    <details class="w-full bg-green-100 font-semibold border rounded-lg">
                        <summary class="px-4 text-xl py-6 focus:outline-none focus-visible:ring-2 ring-green-500"><?php echo htmlspecialchars($schedule['bus_name']); ?> <?php echo htmlspecialchars($schedule['bus_number']); ?> <br> 
                        <div class="flex items-center gap-1 text-sm  font-normal">
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                        <p>Departure Time: <?php echo htmlspecialchars($schedule['departure_time']); ?></p>
                        </div>
                        
                        </summary>
                        <ol class="relative border-l border-gray-200">
                            <?php
                            $prevStopTime = null;
                            $stopPoints = $schedule['stop_points'];
                            $stopPointsTimes = $schedule['stop_points_time'];
                            for ($i = 0; $i < count($stopPoints); $i++) :
                                if ($stopPointsTimes[$i] != $prevStopTime) :
                                    $prevStopTime = $stopPointsTimes[$i];
                            ?>
                                    <li class="mb-10 ml-4">
                                        <div class="absolute w-3 h-3 bg-green-500 rounded-full mt-1.5 -left-1.5 border border-white"></div>
                                        <time class="mb-1 text-sm font-normal leading-none text-gray-400"><?php echo htmlspecialchars(date('h:i A', strtotime($stopPointsTimes[$i]))); ?></time>
                                        <h3 class="text-lg font-semibold text-gray-900">Stop: <?php echo htmlspecialchars($stopPoints[$i]); ?></h3>
                                       
                                       
                                    </li>
                            <?php
                                endif;
                            endfor;
                            ?>
                        </ol>
                    </details>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php require('inc/footer.php'); ?>
</body>
</html>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10) {
        month = '0' + month.toString();
    }
    if(day < 10) {
        day = '0' + day.toString();
    }

    var minDate = year + '-' + month + '-' + day;

    document.getElementById('txtDate').setAttribute('min', minDate);
});
</script>

