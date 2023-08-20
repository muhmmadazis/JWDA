<?php 

require 'function.php';
			$data = query('SELECT * FROM data');
		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<!-- header -->
	<?php include 'header.html'; ?>
	<!-- header -->


	<div class="container">
		<h3 style="text-align: center;">Hasil Pendaftaran</h3>

		<div class="container" style="justify-content: center; align-content: center; align-items: center;">
			<?php foreach ($data as $row): ?>
			<div class="form-group row">
			    <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['nama']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['email']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="nomorhp" class="col-sm-2 col-form-label col-form-label-sm">Nomor HP</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['nomorhp']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="semester" class="col-sm-2 col-form-label col-form-label-sm">Semester</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['semester']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="ipk" class="col-sm-2 col-form-label col-form-label-sm">IPK</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['ipk']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="pilihan_beasiswa" class="col-sm-2 col-form-label col-form-label-sm">Pilihan Beasiswa</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['pilihan_beasiswa']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="berkas" class="col-sm-2 col-form-label col-form-label-sm">berkas</label>
			    <div class="col-sm-7"> :
			      <?php echo $row['berkas']; ?>
			    </div>
			</div>
			<div class="form-group row">
			    <label for="status ajuan" class="col-sm-2 col-form-label col-form-label-sm">status ajuan</label>
			    <div class="col-sm-7" style="color: red;"> :
			      <?php echo $row['status ajuan']; ?>
			    </div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>