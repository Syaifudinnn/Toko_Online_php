<?php
    session_start();
    include "koneksi.php";
    $cart = @$_SESSION['cart'];

    if (count($cart) > 0) {
        foreach ($cart as $key_produk => $val_produk){
            $tgl_beli = date('Y-m-d', mktime(0, 0, 0, date('m'), (date('d')), date('Y')));
            mysqli_query($conn, "insert into beli_produk(id_produk, tanggal_beli) value('" . $val_produk['id_produk'] . "','" . $tgl_beli . "')");
    }

    $id = mysqli_insert_id($conn);
    foreach ($cart as $key_produk => $val_produk) {
        mysqli_query($conn, "insert into detail_beli_produk(id_beli_produk, id_produk, qty, subtotal) value('" . $id . "','" . $val_produk['id_produk'] . "','" . $val_produk['qty'] . "','" . $val_produk['qty']*$val_produk['harga'] . "')");
    }

    unset($_SESSION['cart']);
    echo '<script>alert("Anda berhasil membeli produk");location.href="history_pembelian.php"</script>';
}
?>