<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Paket</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include("Navbar.php") ?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white">
                    Form Paket Laundry
                </h4>
            </div>

            <div class="card-body">
            <?php
                if (isset($_GET["id_paket"])) {
                    $id_paket = $_GET["id_paket"];
                    $sql = "select * from paket where id_paket='$id_paket'";
                    # mengakses data anggota dari id_mobil yg dikirim
                    include("connection.php");

                    #eksekusi perintah sql
                    $hasil = mysqli_query($connect, $sql);

                    #konversi kedalam bentuk array
                    $paket = mysqli_fetch_array($hasil);
            ?>
                        <form action="process-paket.php" method="post"
                        enctype="multipart/form-data">

                            ID Paket
                            <input type="text" name="id_paket"
                            class="form-control mb-2" required
                            value="<?=$paket["id_paket"];?>" readonly>

                            Jenis Paket Laundry
                            <select name="jenis" class="form-control mb-2" required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                            </select>

                            Harga
                            <input type="text" name="harga"
                            class="form-control mb-2" required
                            value="<?=$paket["harga"];?>">

                            <button type="submit" class="btn btn-info btn-block"
                            name="update_paket">
                                Simpan
                            </button>
                        </form>
            <?php
                }else{
                    #form untuk insert
            ?>
                    <form action="process-paket.php" method="post"
                    enctype="multipart/form-data">

                            ID Paket
                            <input type="text" name="id_paket"
                            class="form-control mb-2" required>

                            Jenis Paket Laundry
                            <select name="jenis" class="form-control mb-2" required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                            </select>

                            Harga
                            <input type="text" name="harga"
                            class="form-control mb-2" required>

                        <button type="submit" class="btn btn-info btn-block"
                        name="simpan_paket">
                            Simpan
                        </button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>