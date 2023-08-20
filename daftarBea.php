<?php

require 'function.php';
$db = mysqli_connect("localhost","root","","beasiswa");

if(isset($_POST['submit'])) {

  if (daftar($_POST) > 0 ) {
    echo "<script>
         alert('Berhasil Mendaftar!');
         document.location.href = 'hasil.php';
         </script>
         ";
      } else {
         echo "<script>
         alert('Pendaftaran Gagal!');
         document.location.href = 'daftarBea.php';
         </script>
         ";

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Beasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }


        section {
            margin: 2rem;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="tel"],
        form select,
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

	<!-- header -->
	<?php include 'header.html'; ?>
	<!-- header -->
    
    <section id="daftar-beasiswa">
    	<h2 style="text-align: center;">Form Pendaftaran Beasiswa</h2>
    	<form id="beasiswa-form" method="POST" class="container">
		  <div class="form-group row">
		    <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
		    <div class="col-sm-10">
		      <input name="nama" type="text" class="form-control form-control-sm" id="nama" placeholder="Masukan Nama">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
		    <div class="col-sm-10">
		      <input name="email" type="email" class="form-control form-control-sm" id="email" placeholder="Masukan Email">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="nomorhp" class="col-sm-2 col-form-label col-form-label-sm">Nomor HP</label>
		    <div class="col-sm-10">
		      <input name="nomorhp" type="tel" class="form-control form-control-sm" id="nomorhp" placeholder="Masukan Nomor HP">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="semester" class="col-sm-2 col-form-label col-form-label-sm">Semester Saat Ini:</label>
		    <div class="col-sm-10">
		      <select id="semester" name="semester" required>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>
                <option value="8">Semester 8</option>
            </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="ipk" class="col-sm-2 col-form-label col-form-label-sm">IPK Terakhir</label>
		    <div class="col-sm-10">
		      <input name="ipk" type="tel" class="form-control form-control-sm" id="ipk" placeholder="IPK">
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="beasiswa" class="col-sm-2 col-form-label col-form-label-sm">Pilihan Beasiswa</label>
		    <div class="col-sm-10">
		      <select id="pilihan-beasiswa" name="pilihan_beasiswa" disabled>
                <option value="Beasiswa Indonesia Maju">Beasiswa Indonesia Maju</option>
                <option value="Beasiswa Nasional">Beasiswa Nasional</option>
                <option value="Beasiswa Internasional">Beasiswa Internasional</option>
            </select>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="berkas" class="col-sm-2 col-form-label col-form-label-sm">Upload Berkas</label>
		    <div class="col-sm-10">
		      <input type="file" id="berkas" name="berkas" accept=".pdf,.jpg,.jpeg,.png,.zip">
		    </div>
		  </div>

		  <button type="submit" name="submit" id="daftar-btn" disabled >Daftar</button>
		  <button type="button" name="button" id="daftar-btn" style="background-color: red;"><a href="index.php" style="text-decoration: none; color: white;">Batal</a></button>
		</form>

    <script>
        const ipkThreshold = 3.0;

        function generateRandomIPK() {
            return (Math.random() * (4.0 - 2.0) + 2.0).toFixed(2);
        }

        const namaInput = document.getElementById('nama');
        const emailInput = document.getElementById('email');
        const nomorHpInput = document.getElementById('nomorhp');
        const semesterSelect = document.getElementById('semester');
        const ipkInput = document.getElementById('ipk');
        const beasiswaSelect = document.getElementById('pilihan-beasiswa');
        const berkasInput = document.getElementById('berkas');
        const daftarButton = document.getElementById('daftar-btn');
        const hasilDiv = document.getElementById('hasil');

        semesterSelect.addEventListener('change', () => {
            if (parseFloat(ipkInput.value) >= ipkThreshold) {
                beasiswaSelect.disabled = false;
            }
        });

        namaInput.addEventListener('input', () => {
            const randomIPK = generateRandomIPK();
            ipkInput.value = randomIPK;

            if (parseFloat(randomIPK) >= ipkThreshold) {
                beasiswaSelect.disabled = false;
            } else {
                beasiswaSelect.disabled = true;
                daftarButton.disabled = true;
            }
        });

        ipkInput.readOnly = true;

        ipkInput.addEventListener('change', () => {
            if (parseFloat(ipkInput.value) >= ipkThreshold) {
                beasiswaSelect.disabled = false;
            } else {
                beasiswaSelect.disabled = true;
                daftarButton.disabled = true;
            }
        });

        berkasInput.addEventListener('change', () => {
            daftarButton.disabled = false;
            daftarButton.focus();
        });

    </script>
</body>
</html>
