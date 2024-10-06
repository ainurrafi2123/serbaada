<!-- <?php
    // include 'secure.php';
?> -->
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    

  <title></title>
</head>
<body>
    <div class="container mt-5">
      <h3>Tampil petugas</h3>
      <table class="table table-hover table-striped">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>NAMA PETUGAS</th>
                  <th>USERNAME</th>
                  <th>LEVEL</th>
                  <th>AKSI</th>
              </tr>
          </thead>
          <tbody>
          <?php 
              include "config/koneksi.php";
              $qry_petugas=mysqli_query($conn,"SELECT * FROM petugas JOIN level ON level.id_level=petugas.id_level");
              $no=0;
              while($dt_petugas=mysqli_fetch_array($qry_petugas)){
              $no++;?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $dt_petugas['nama_petugas'] ?></td> 
            <td><?= $dt_petugas['username'] ?></td> 
            <td><?= $dt_petugas['nama_level'] ?></td> 
            <td>
              <a href="ubah_petugas.php?id_petugas=<?= $dt_petugas['id_petugas'] ?>" class="btn btn-success">Ubah</a> | 
              <a href="hapus_petugas.php?id_petugas=<?= $dt_petugas['id_petugas'] ?>"
                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php 
          }
          ?>
          </tbody>
      </table>
      <a href="tambah_petugas.php" class="btn btn-primary">Tambah petugas</a>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>



