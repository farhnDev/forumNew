            <?php
            require '../database/koneksi.php';
            $_SESSION["id"] = 1;
            $sessionId = $_SESSION["id"];

            $stmt = $koneksi->prepare("SELECT * FROM users WHERE id_user = :sessionId");
            $stmt->bindParam(":sessionId", $sessionId);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="../asset/css/style.css">
                <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" crossorigin="anonymous" />
                <title>Home</title>
            </head>

            <body>
                <header class="sticky-top">
                    <nav class="nav col-12 ">
                        <div class="profil-back1">
                            <h4 class="blink-text">Profile</h4>
                        </div>
                        <div class="profil-back">
                            <a class="ikon-profil" href="../user/home_fix.php">
                                <i class="fa-sharp fa-solid fa-person-walking-arrow-loop-left" title="Home"></i>
                            </a>
                        </div>
                    </nav>
                </header>
                <div class="container3">
                    <div class="card5" data-tilt>
                        <!-- <div> -->
                        <form class="form" id="form" action="update_profile.php" enctype="multipart/form-data" method="post">
                            <div class="upload">
                                <?php
                                $id = $user["id_user"];
                                $name = $user["nama"];
                                $image = $user["images"];
                                ?>
                                <img src="../img/<?= $image; ?>" width="125" height="125" title="<?= $image; ?>">
                                <div class="round">
                                    <input type="hidden" name="id_user" value="<?= $id; ?>">
                                    <input type="hidden" name="nama" value="<?= $name; ?>">
                                    <input type="file" name="images" id="images" accept=".jpg, .jpeg, .png" title="update profile">
                                    <i class="fa fa-camera" style="color:#fff"></i>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                        <h2>My Profile</h2>
                        <p class="bio">Lorem ipsum dolor sit amet consectetur,
                            adipisicing elit. Molestias minus et quasi, officiis,
                            esse dolorum pariatur obcaecati culpa rem dolores praesentium
                            nulla iusto laborum, animi quaerat ipsa amet! Suscipit,
                            temporibus.</p>
                        <div class="edit-profil">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-user-edit"></i>Edit</a>
                            <a href="#" class="btn btn-light"><i class="fas fa-sign-out"></i>Keluar</a>
                        </div>
                    </div>
                </div>
                <!-- structure modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Header modal -->
                            <div class="modal-header">
                                <h5 class="modal-title">My Biodata</h5>
                            </div>

                            <!-- Konten modal -->
                            <div class="modal-body">
                                <form action="kursus" method="POST">
                                    <div class="mb-3 ">
                                        <label for="username">Username </label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="tgl_lahir">Tanggal Lahir </label>
                                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="bio">Bio </label>
                                        <input type="text" class="form-control" id="bio" name="bio" required>
                                    </div>
                                </form>
                            </div>

                            <!-- Footer modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" onclick="save()" id="btn_save">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById("images").onchange = function() {
                        document.getElementById("form").submit();
                    };
                </script>
                <?php include '../includes/footer.php'; ?>