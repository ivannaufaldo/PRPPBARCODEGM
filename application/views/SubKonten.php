<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
	body {
	  padding-top : 20px;
      margin: 5px;
	}
    iframe {
        border-radius : 10px;
    }
    button{
        float: Right;
    }
	</style>
</head>
<body>
	<?php foreach($row as $k){ ?>
	<div id="<?php echo $k->Id_konten; ?>">
	    <h4><?php echo $k->Sub_Konten; ?></h4>
	</div>
	<div id="box">
	<iframe width="100%" src="<?php echo $k->Url_Konten; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<div align="justify"><?php echo $k->Konten; ?></div>
	<form action="<?php echo base_url('index.php/Home/toScan') ?>" method="get">
        <button class="btn btn-secondary btn-lg">ScanAgain</button>
    </form>
    <br>
    <br>
    </div>
	<?php } ?>
</body>
</html>