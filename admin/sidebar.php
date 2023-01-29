<h1>Perpustakaan SMKN 64</h1>

<div class="sidebar">
    <?= $data_user["fullname"] ?>

    <ul>
        <li><a href="http://localhost/perpustakaan/admin/index.php">Dashboard</a></li>
        <li><a href="#">Master Data</a></li>
            <ul>
                <li><a href="http://localhost/perpustakaan/admin/master_data/data_anggota/index.php">Data Anggota</a></li>
                <li><a href="http://localhost/perpustakaan/admin/master_data/data_administrator/index.php">Data Administrator</a></li>
                <li><a href="http://localhost/perpustakaan/admin/master_data/data_peminjaman/index.php">Data Peminjaman</a></li>
            </ul>
    </li>
    <li><a href="">Katalog Data</a>
        <ul>
            <li><a href="http://localhost/perpustakaan/admin/katalog_buku/data_buku/index.php">Data Buku</a></li>
            <li><a href="http://localhost/perpustakaan/admin/katalog_buku/data_kategori/index.php">Data Kategori</a></li>
            <li><a href="http://localhost/perpustakaan/admin/katalog_buku/data_penerbit/index.php">Data Penerbit</a></li>
        </ul>
    </li>
    <li><a href="http://localhost/perpustakaan/admin/laporan_perpustakaan/index.php">Laporan Perpustakaan</a></li>
    <li><a href="http://localhost/perpustakaan/admin/identitas.php">Identitas Aplikasi</a></li> 
    <li><a href="http://localhost/perpustakaan/admin/pesan.php">Pesan</a></li>
    <li><a href="">Keluar</a></li>     
    </ul>
</div>