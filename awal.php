<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gds";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$p = ("SELECT * FROM students limit 100");
$murid = mysqli_query($conn, $p);

?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .banner-image {
            background-image: url(upload/2.jpg);
            background-size: cover;
        }

        * {
            transition: .5s ease;

        }

        nav {
            background-color: rgba(255, 255, 255, 0.1);
        }

        a {
            font-weight: 600;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Gds</title>
</head>

<body>



    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3" style="color:darkgray">
        <div class="container">
            <a href="" class="navbar-brand"> <img src="upload/wk-removebg-preview.png" alt="" width="40px"
                    class="me-2">فحص<span style="color:cyan">ويكراما بوجور</span> </a>
            <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white" data-toggle="modal" data-target="#myModal"> INPUT DATA</a>
                    </li>


                </ul>
            </div>

        </div>

    </nav>
    <div class="banner-image w-100 vh-100 d-flex align-items-center">
        <div class="content d-flex " style="margin-top:12%">
            <div class="kanan" style="margin-left:200px;color:white;width:450px; margin-right:-50px">
                <div class="div kertas">
                    <h1>apa itu GDS🤔?</h1>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam veritatis dolorum consectetur quia
                    itaque officiis ipsa totam? Cumque sed temporibus, doloribus quas harum odio? Impedit fuga cum
                    cupiditate molestiae sit praesentium ullam? A earum sequi corrupti soluta, quo voluptas. Cupiditate.
                </div>
            </div>


            <div class="slider">
                <div class="item text-center">
                    <br>
                    <br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br>
                    <br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br>
                    <br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br>
                    <br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br>
                    <br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br><br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>
                <div class="item">
                    <br><br><br><br>
                    <img src="https://c.tenor.com/PaWj2HJ3rBsAAAAM/listening-to-music-headphones.gif" alt=""
                        style="margin-left:25%">
                </div>

                <button id="next">></button>
                <button id="prev">
                    <</button>
            </div>


        </div>
    </div>

    <body>

        <!-- Tombol untuk memunculkan modal -->


        <!-- Modal -->



        </div>
        <div class="container my-5 d-grid gap-5">
            <div class="p-5 border">
                <h1>Data Siswa</h1><br>
                <div class="container">
                    <table class="table">
                        <form class="form-inline" action="" method="get">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="query"
                                    placeholder="Kata kunci Berdasarkan Nis" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        Cari
                                    </button>
                                    <a href="awal.php" style="text-decoration:none;">Reset</a>
                                    
                                </div>
                            </div>
                        </form>
                        <?php if (isset($_GET['query'])) {

                            $nis = $_GET['query'];
                            $query = "SELECT * FROM students WHERE nis = '$nis'";
                            $result = mysqli_query($conn, $query);
                            $murid = mysqli_fetch_assoc($result);

                            echo "<table class='table table-striped'>";
                            echo "<thead><tr><th>NIS</th><th>Nama</th><th>Rombel</th><th>Rayon</th><th>Action</th></tr></thead>";
                            echo "<tbody><tr><td>" . $murid['nis'] . "</td><td>" . $murid['name'] . "</td><td>" . $murid['rombel'] . "</td><td>" . $murid['rayon'] . "</td><td><button type='button' class='btn btn-primary'>History Gds</button> </td></tr></tbody>";
                            echo "</table>";
                        } else {
                            foreach ($murid as $m) { ?>
                                <thead>
                                    <tr>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Rombel</th>
                                        <th>Rayon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $m['nis'] ?>
                                        </td>
                                        <td>
                                            <?= $m['name'] ?>
                                        </td>
                                        <td>
                                            <?= $m['rombel'] ?>
                                        </td>
                                        <td>
                                            <?= $m['rayon'] ?>
                                        </td>
                                        <td><button type="button" class="btn btn-primary" >
                                                History Gds
                                            </button>
                                    </tr>

                                </tbody>
                            <?php }
                        } ?>
                    </table>
                </div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">INPUT GDS</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Bagian konten modal -->
                            <div class="modal-body">
                                <!DOCTYPE html>
                                <html>

                                <head>
                                    <!-- bootstrap  -->

                                    <link rel="stylesheet"
                                        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
                                        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
                                        crossorigin="anonymous">

                                    <link
                                        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                        rel="stylesheet" />
                                </head>

                                <body>


                                    <div class="container d-flex " style="width: 1000px; margin-left:10%">
                                        <br>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <!-- form  -->
                                                        <form id="form">
                                                            <div class="form-group" id="students">
                                                                <label>Student</label>
                                                                <select class="form-control form-control-select"
                                                                    name="student_id" id="student_id">
                                                                    <option value=""></option>
                                                                    <?php
                                                                    //koneksi ke database
                                                                    $koneksi = new mysqli('localhost', 'root', '', 'gds');

                                                                    //mengambil data ke tabel biodata
                                                                    $select = mysqli_query($koneksi, 'select * from students');

                                                                    //melakukan looping dengan while
                                                                    while ($hasil = mysqli_fetch_array($select)) {
                                                                        ?>

                                                                        <option value="<?php echo $hasil['id']; ?>">
                                                                            <?php echo $hasil['nis'] . ' - ' . $hasil['name'] . ' - ' . $hasil['gender'] . ' - ' . $hasil['rayon'] . ' - ' . $hasil['rombel']; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <select class="form-control form-control-select"
                                                                    name="description" id="description">
                                                                    <option value=""></option>
                                                                    <option value="atribut">Atribut</option>
                                                                    <option value="makanan">Makanan</option>
                                                                    <option value="make up">Make Up</option>
                                                                    <option value="tisu">Tisu</option>
                                                                    <option value="terlambat">Terlambat</option>
                                                                </select>
                                                            </div>
                                                           


    <div id='my_camera'> </div>

                                                            
                                                           
                                                            <br>
                                                            <hr>
                                                            <button type="submit" class="tombol-simpan btn btn-primary">Input</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="data">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                

                                </html>
                            </div>

                            <div class="modal-footer">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
    

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="js/tes.js"></script>
    <script>
        var nav = document.querySelector('nav');
        window.addEventListener("scroll", function () {
            if (window.pageYOffset > 100) {
                nav.classList.add('bg-dark', 'text-dark');
            } else {
                nav.classList.remove('bg-dark', 'text-dark');
            }
        });
    </script>
                                        <!-- jquery  -->
                                        <script src="https://code.jquery.com/jquery-3.5.1.js"
                                        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                                        crossorigin="anonymous"></script>
                                    <script
                                        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
                                        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
                                        crossorigin="anonymous">
                                        </script>
                                    <!-- bootstrap js  -->
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
                                        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
                                        crossorigin="anonymous">
                                        </script>
                                    <script
                                        src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <!-- webcamjs  -->
                                    <script
                                        src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
                                    <script language="JavaScript">
                                        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
                                        Webcam.set({
                                            width: 300,
                                            height: 240,
                                            image_format: 'jpeg',
                                            jpeg_quality: 90,
                                            flip_horiz: true
                                        });

                                        //menampilkan webcam di dalam file html dengan id my_camera
                                        Webcam.attach('#my_camera');

                                    </script>

                                    <script type="text/javascript">
                                        // saat dokumen selesai dibuat jalankan fungsi update
                                        $(document).ready(function () {
                                            update();
                                            $('#student_id').select2({
                                                placeholder: "-- Please select --"
                                            });
                                            $('#description').select2({
                                                placeholder: "-- Please select --"
                                            });
                                        });

                                        // otomatis isi ketika pilih student
                                        $("#student_id").on('change', function () {
                                            console.log($('#student_id').val())
                                            $.ajax({
                                                url: 'students.php',
                                                type: 'get',
                                                data: {
                                                    student_id: $('#student_id').val()
                                                },
                                                success: function (data) {
                                                    let hasil = JSON.parse(data);
                                                    $('#gender').val(hasil.gender)
                                                    $('#rayon').val(hasil.rayon)
                                                    $('#rombel').val(hasil.rombel)
                                                }
                                            });
                                        });

                                        // jalankan aksi saat tombol register disubmit
                                        $(".tombol-simpan").click(function () {
                                            event.preventDefault();

                                            // membuat variabel image
                                            var image = '';

                                            //mengambil data student_id dari form di atas dengan id student_id
                                            var student_id = $('#student_id').val();

                                            //mengambil data description dari form di atas dengan id description
                                            var description = $('#description').val();

                                            //memasukkan data gambar ke dalam variabel image
                                            Webcam.snap(function (data_uri) {
                                                image = data_uri;
                                            });

                                            //mengirimkan data ke file action.php dengan teknik ajax
                                            $.ajax({
                                                url: 'action.php',
                                                type: 'POST',
                                                data: {
                                                    student_id: student_id,
                                                    description: description,
                                                    image: image
                                                },
                                                success: function () {
                                                    alert('input data berhasil');
                                                    // menjalankan fungsi update setelah kirim data selesai dilakukan 
                                                    update()
                                                },
                                                error: function (err) {
                                                    console.log(err);
                                                }
                                            })
                                        });



                                    </script>

<?php
