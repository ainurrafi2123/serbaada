
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/style.css">
    <title>Form Design</title>
  </head>
  <body>
   <div class="container-fluid bg-dark text-light py-3">
       <header class="text-center">
           <h1 class="display-6">Welcome to our page</h1>
       </header>
   </div>
   <section class="container my-2 bg-dark w-50 text-light p-2">
    <form action="proses_level.php" class="row g-3 p-3" method="post">
        <div class="col-12">
          <label for="nama_level" class="form-label">Level</label>
          <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="level" required>
        </div>
        <div class="col-12">
          <label for="hak_akses" class="form-label">Hak Akses</label>
          <input type="text" class="form-control" id="hak_akses" name="hak_akses" placeholder="Akses Anda"  required>
        </div>
        <div class="col-12">
          <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
          <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Masukkan gaji_pokok"  min="0"  required>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="terms">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
   </section>
  </body>
</html>
