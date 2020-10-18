<!DOCTYPE html>
<html>
<head>
	<title>Report Pdf Schedule</title>
</head>
<body>
<!--<div class="container-fluid"> -->
	<center><h1>Report Pdf Schedule</h1>
	<table border="1">
						<tr>
							<th>Id</th>
                            <th>Event Name</th>
                            <th>Artist</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
							
						</tr>
	                        <?php foreach ($sche_list as $key) {?>
                        <tr>
                            <td><?php echo $key->idSchedule; ?></td>
                            <td><?php echo $key->name; ?></td>
                            <td><?php echo $key->artist; ?></td>
                            <td><?php echo $key->venue; ?></td>
                            <td><?php echo $key->date; ?></td>
                            <td><?php echo $key->startTime; ?></td>
                            <td><?php echo $key->endTime; ?></td>
                            
                        </tr>

                        <!--<img src="<?php //base_url()?>./assets/imgEvent/surbay.jpg">
                        Jangan lupa diberi titik agar muncul -->
                        <?php } ?>
  </table>
<!--</div> -->
</body>
</html>