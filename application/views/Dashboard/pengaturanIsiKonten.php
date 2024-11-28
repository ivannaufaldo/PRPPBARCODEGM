<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Pengaturan Isi Konten</title>
    <style>
        a{
            color: #000000;
            text-decoration: none;
        }
        .container{
            margin: 10px;
        }
    </style>
  </head>
  <body>
  <div class="container">
  <?php foreach($konten as $k):?>   
    <form action="<?= base_url('index.php/Dashboard/tambahIsiKonten/'.$k->Id_konten) ?>" method="get">
        <button type="submit" class="btn btn-primary" >Tambah Konten <?= $k->konten; ?> </button>
    </form> 
    <?php endforeach; ?> 
    <table class="table">
        <tr class="table-dark">
            <th style="text-align: center;">No</th>
            <th>Judul Konten</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            $i = 1;
            foreach ($isikonten->result() as $k=>$data){    
        ?>
    	    <tr>
                <td style="text-align: center;"><?= $i++ ?></td>
                <td><a href="#"><?=$data->judul?></a></td>
                <td><a href="<?php echo base_url('index.php/Dashboard/EditIsiKonten/'.$data->Id_isi_konten) ?>">Edit</a></td>
                <td><a href="<?php echo base_url('index.php/Dashboard/DeleteIsiKonten/'.$data->Id_isi_konten) ?>">Delete</a></td>
            </tr>
    	<?php 
    }?>
    </table>
    
    <form action="<?= base_url('index.php/Dashboard') ?>" method="get">
        <button type="submit" class="btn btn-primary" >Dashboard</button>
    </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
