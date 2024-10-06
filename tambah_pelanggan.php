<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="container mt-3">
        <h3>Tambah pelanggan</h3>
        <form action="proses_pelanggan.php" method="post">
            nama :
            <input type="text" name="nama_pelanggan" value="" class="form-control">
            alamat : 
            <input type="text" name="alamat" value="" class="form-control">
            Telp : 
            <input type="tel" name="telp" value="" class="form-control">
            Username : 
            <input type="text" name="username" value="" class="form-control">
            Password : 
            <input type="password" name="password" value="" class="form-control">
            </br>
            <input type="submit" name="simpan" value="Tambah pelanggan" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>