<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
  <div class="container mt-3">

    <h3>Tambah Petugas</h3>
    <form action="proses_petugas.php" method="post">
        nama petugas :
        <input type="text" name="nama_petugas" value="" class="form-control">
        <label for="level" class="form-label text-dark">Level</label>
          <select name="id_level" class="form-control" required>
            <option value="">Pilih Level</option>
              <?php
              include "config/koneksi.php";
              $qry_level=mysqli_query($conn,"SELECT * FROM level");
              while($data_level=mysqli_fetch_array($qry_level)){
                  echo '<option value="'.$data_level['id_level'].'">'.$data_level['nama_level'].'</option>';    
                }
                ?>
           </select>
        Username : 
        <input type="text" name="username" value="" class="form-control">
        Password : 
        <input type="password" name="password" value="" class="form-control">
</br>
        <input type="submit" name="simpan" value="Tambah petugas" class="btn btn-primary">
    </form>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>