<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
  <style type="text/css">
    html,body {
      height: 100%;
    }
    body {
      text-align: center;
      margin: 0;
    }
    video {
      position: relative;
      transform: rotateY(180deg);
      border-radius:40px;
      overflow:hidden;
    }
    p {
        font-family: Poppins,serif;
        font-weight: 900;
        margin-top : 25px;
        font-size  : 70px;
    }
  </style>
</head>
<body>
    <p>SCAN QR CODE</p>
    <div id=".vid-border">
        <video autoplay="1" id="scanner" width="90%" height="100%" ></video>
        <input type="hidden" id="url" visible="hidden">
    </div>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });
      scanner.addListener('scan', function (content) {
        document.getElementById('url').value=content;
        //ini ati ati
        location.replace("index.php/Home/toContent/"+document.getElementById('url').value);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          var selectedCam = cameras[0];
          $.each(cameras, (i, c) => {
              if (c.name.indexOf('back') != -1) {
                  selectedCam = c;
                  return false;
              }
          });
          scanner.start(selectedCam);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
</body>
</html>




<!-- <!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style type="text/css">
    .my-box {
      box-sizing: border-box;
      width: 200px;
      border: 10px solid;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div id="my-box">
    <div class="container"> 
      <div class="card">
        <div class="card-body" width="auto">
          <center>
              <video autoplay="1" id="scanner" width="auto" height="auto" ></video>  
          </center>
        </div>
      </div>
    </div>
    <input type="hidden" id="url" visible="hidden">
    <div class="container">
      <div class="card-body">
        <form style="display: inline" action="<?php echo base_url('index.php/Home') ?>" method="get">
            <button class="btn-secondary">Beranda</button>
        </form>
      </div>
    </div>
  </div>  
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });
      scanner.addListener('scan', function (content) {
        document.getElementById('url').value=content;
        location.replace("localhost/index.php/Home/toContent/"+document.getElementById('url').value);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          var selectedCam = cameras[0];
          $.each(cameras, (i, c) => {
              if (c.name.indexOf('back') != -1) {
                  selectedCam = c;
                  return false;
              }
          });
          scanner.start(selectedCam);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
</body>
</html> -->