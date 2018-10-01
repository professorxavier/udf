<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="author" content="Huriel Lopes" />
	<meta name="description" content="Sistema Procedural para evento TechDay da UDF" />
	<meta name="keyword" content="palestra, TI, desenvolvimento, programação, live" />
	<title>Tech Day</title>
    <link rel="stylesheet" href="/public/resources/pnotify/pnotify.custom.min.css" />
    <link rel="stylesheet" href="/public/assets/css/style.css" />
    <link rel="stylesheet" href="/public/resources/datatables/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-my-color-5">
		<div class="container">
		  <a class="navbar-brand" href="/"><img src="/assets/img/logo.png" alt="logo tecday" class="logo" /></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="/evento/inscricao">Inscrições</a>
		      </li>
		    </ul>
		  </div>
	  </div>
	</nav>
	<div class="row">
		<div class="container">
			<div class="col-md-12 col-sm-12">
				<?php include $content;?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="/public/resources/datatables/jquery.dataTables.min.js"></script>
	<script src="/public/resources/datatables/dataTables.bootstrap4.min.js"></script>
	<script scr="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script scr="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="/public/resources/pnotify/pnotify.custom.min.js"></script>
    <script src="/public/assets/js/jquery.mask.min.js"></script>
    <script src="/public/assets/js/scripts.js"></script>
    <script>
        <?php flash(); ?>

        const confirmEl = document.querySelector('.confirm');

        if (confirmEl) {
            confirmEl.addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('Tem certeza que quer fazer essa ação?')) {
                    window.location = e.target.getAttribute('href');
                }
            });
        }
    </script>
    <script>
      var player = document.getElementById('player');
      var snapshotCanvas = document.getElementById('snapshot');
      var captureButton = document.getElementById('capture');
      var videoTracks;

      var handleSuccess = function(stream) {
        // Attach the video stream to the video element and autoplay.
        if (player) {
        	player.srcObject = stream;
        }
        videoTracks = stream.getVideoTracks();
      };
      if (captureButton) {
	      captureButton.addEventListener('click', function() {
	        var context = snapshot.getContext('2d');
	        context.drawImage(player, 0, 0, snapshotCanvas.width, snapshotCanvas.height);
	        var dataURL = snapshotCanvas.toDataURL();
	        var campo = document.getElementById("img");
	        campo.value = dataURL;
	        // Stop all video streams.
	        videoTracks.forEach(function(track) {track.stop()});
	      });
  	  }

      navigator.mediaDevices.getUserMedia({video: true})
      .then(handleSuccess);
      </script>
</body>
</html>