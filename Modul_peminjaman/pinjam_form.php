<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

// ... ambil data dari database
include '../Modul_buku/proses_list_buku.php';

// ... ambil data dari database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container clearfix">
    

        <?php include '../sidebars.php' ?>

        <div class="content">
            <h3>Transaksi Peminjaman</h3>
            <?php
            // Check message ada atau tidak
            if(!empty($_SESSION['messages'])) {
                echo $_SESSION['messages']; //menampilkan pesan 
                unset($_SESSION['messages']); //menghapus pesan setelah refresh
            }
            ?>
            <form action="proses_tambah_pinjam.php" method="post">
                <p>Buku</p>
                <p>
                    <select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?>"><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Anggota</p>
                <p>
                    <select name="anggota">
                        <?php foreach ($data_anggota as $anggota) : ?>
                        <option value="<?php echo $anggota['anggota_id'] ?>"><?php echo $anggota['anggota_nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Tanggal Pinjam</p>
                <p><input type="date" name="tgl_pinjam"></p>

                <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="tgl_jatuh_tempo"></p>

                <p><input type="submit" class="btn btn-submit" value="Simpan"></p>
            </form>
        </div>

    </div>
</body>
</html>
