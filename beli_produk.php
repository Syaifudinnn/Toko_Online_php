<?php
    include "header.php";
    include "koneksi.php";
    $qry_detail_produk = mysqli_query($conn, "select * from produk where id_produk = '" . $_GET['id_produk'] . "'");
    $dt_produk = mysqli_fetch_array($qry_detail_produk);
?>

<h2>Beli Produk</h2>
<div class="row">
    <div class="col-md-4">
        <img src="image/<?= $dt_produk['foto_produk'] ?>" class="card-img-top">
    </div>
    <div class="col-md-8">
        <form action="masukkan_keranjang.php?id_produk=<?= $dt_produk['id_produk'] ?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama
                            Produk</td>
                        <td><?= $dt_produk['nama_produk'] ?></td>
                    </tr>
                    <tr>

                        <td>Harga</td>
                        <td><?= $dt_produk['harga'] ?></td>
                    </tr>
                    <tr>

                        <td>Jumlah</td>
                        <td><input type="number" name="jumlah" value="1"></td>
                    </tr>
                </thead>
            </table>
            <td colspan="2"><input class="btn btn-success" type="submit" value="Beli"></td>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>