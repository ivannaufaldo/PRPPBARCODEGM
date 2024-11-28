<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <br>
	<div class="container">
        <input type="text" id="pencarianKotaKabupaten" placeholder="Cari Kota / Kabupaten">
        <div class="card-body">
            <form style="display: inline" action="<?php echo base_url('index.php/Home/toScan') ?>" method="get">
                <button class="btn-primary">Scan QR</button>
            </form>
        </div>  
    </div>
    <div class="box">
    	<div class="box-body">
    		<?php 
    		foreach ($row->result() as $kk=>$data){
    		 ?>
    		<p><a href="<?php echo base_url('index.php/Home/toContent/'.$data->ID) ?>"><?=$data->KotaKabupaten?></a></p>
    		<?php 
    		} ?>
    	</div>
    </div>
</body>
</html> -->