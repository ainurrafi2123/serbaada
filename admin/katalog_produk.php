<?php
  include 'navbar_admin.php';
?>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #333;
            text-align: left;
        }
        .product-grid {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
          gap: 20px; /* Jarak antar card */
          margin-top: 40px; /* Celah antara katalog dan card */
        }
        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
        }
        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 10px 0;
        }
        .product-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #e44d26;
        }
        .product-category {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
        }
    </style>

    <div class="container mt-3">
        <h1>Katalog Produk</h1>
        <div class="product-grid">
            <?php 
            include "config/koneksi.php";
            $qry_produk = mysqli_query($conn, "SELECT p.*, k.nama_kategori 
                                               FROM produk p 
                                               JOIN kategori k ON k.id_kategori = p.id_kategori");
            while($data_produk = mysqli_fetch_assoc($qry_produk)) {
            ?>
            <div class="product-card">
                <img src="../assets/foto_produk/<?php echo $data_produk['foto_produk']; ?>" alt="<?php echo $data_produk['nama_produk']; ?>" class="product-image">
                <div class="product-info">
                    <h2 class="product-name"><?php echo $data_produk['nama_produk']; ?></h2>
                    <p class="product-description"><?php echo substr($data_produk['deskripsi'], 0, 100) . '...'; ?></p>
                    <p class="product-price">Rp <?php echo number_format($data_produk['harga'], 0, ',', '.'); ?></p>
                    <p class="product-category"><?php echo $data_produk['nama_kategori']; ?></p>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>


<?php
  include 'footer.php';
?>
    
    
    
    