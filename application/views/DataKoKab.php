<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
	<style>
	body {
      font-family: Poppins,sans-serif;
      padding-right: 10px;
      padding-left: 5px;
	}
    iframe {
        border-radius : 10px;
    }
    h1{
        text-align : center;
    }
    .but1{
        position:fixed;
        right:15px;
        bottom:20px;
        background-color: #000;
        border-width:0px;
        border-radius:10px;
        font-size:20px;
        color:#fff;
        border-color: #000;
        padding : 10px 20px;
    }
    h2{
        display: inline;
        text-align: left;
    }
    h3{
        font-size: 20px;
        font-weight: 900;
        text-align: left;
    }
    p{
        padding-top : 10px;
        font-size: 17px;
        font-weight: 400;
        line-height: 2.0;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    img{
        border-radius:10px;
        margin-bottom:-10px;
    }
    li{
        margin-left:-20px;
    }
    .but2{
        background-color: #fff;
        border-width:1px;
        border-radius:10px;
        font-size:20px;
        color:#000;
        border-color: #000;
        padding : 10px 20px; 
        margin-bottom:10px;
    }
	</style>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php foreach($namaKK as $nkk){ ?>
	<div id="header">
	    <h1><?php echo $nkk->KotaKabupaten;} ?></h1>
	</div>
	<?php foreach($row as $k){ ?>
	<hr>
	<div id="<?php echo $k->Id_konten; ?>">
	    <h2><?php echo $k->konten; ?></h2>
	</div>
	<!--<iframe width="100%" src="<?php echo $k->Url_Konten; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
	<div align="justify"><?php echo $k->isi_konten; ?></div>
	<!-- <form action="<?php echo base_url('/') ?>" method="get">
        <button class="but1">Kembali</button>
    </form> -->
    </div>
	<?php } ?>
    <form action="<?php echo base_url('/') ?>" method="get">
        <button class="but1">Kembali</button>
    </form>
    <br>
    <hr>
    <?php foreach($namaKK as $nkk){?>
        <a href="<?php echo $nkk->urlkokab ;?>" target="_blank" style="text-decoration: none;"><button class="but2"><?php echo $nkk->KotaKabupaten;?></button></a>
    <?php } ?>    
    
</body>
</html>