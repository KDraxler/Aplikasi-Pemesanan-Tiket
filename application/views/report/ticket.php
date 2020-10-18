<!DOCTYPE html>
<html>
<head>
  <title>HTML event tickets</title>
  <link href='https://fonts.googleapis.com/css?family=Lobster|Kreon:400,700' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" href="styles/main.css" media="screen" charset="utf-8"/> -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="content-type" content="text-html; charset=utf-8">
</head>

<body>
 
  <div class="container" style="padding-right: 300px">
    <?php foreach ($list as $key): ?>
    <section>
      <div class="card" style="border: 2px solid black">
        <div class="container" style="padding-left: 10px;padding-bottom: 5px">
        <div class="row">
          <div class="col-4">
        <pre><h3>Ticket Code : <?php echo $key->idOrder ?>-<?php echo $key->codeTicket ?></h3></pre>
        <h1><?php echo $key->name ?> <br>By <?php echo $key->artist ?></h1></div>
         <div class="col-6">
        <pre><?php echo $key->venue; ?>,&nbsp; <?php echo $key->city; ?>,&nbsp;<?php echo $key->country; ?><br></pre>
        <?php $dates =  $key->date; $ubah = date_format(new dateTime($dates),' D M Y');?>
        <pre><?php echo $ubah?>&nbsp;- &nbsp;<?php echo $key->startTime?><br></pre>

        <pre><span class="label">Section : </span><span><?php echo $key->seatZone ?></span></pre>
        <br>
        <pre>Barcode<br></pre>
         <img src="<?php base_url()?>./assets/imgEvent/barcode/<?php echo $key->barcodePic?>"></div>
    </div>
    </div>
  </div>
  </section>
  <br><br><br><br>
    <?php endforeach ?>
  </div>
</body>

</html>
