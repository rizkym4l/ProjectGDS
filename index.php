<!DOCTYPE html>
<html>
<head>
    <!-- bootstrap  -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    
<div class="alert alert-success">
            <h1>Aplikasi Galeri</h1>
            <h5>Belajar capture gambar dengan webcam, menyimpan data ke database, dan menampilkan hasilnya</h5>
        </div>
    <div class="container d-flex " >
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
                                <select class="form-control form-control-select" name="student_id" id="student_id">
                                    <option value=""></option>
                                    <?php
                                        //koneksi ke database
                                        $koneksi    = new mysqli('localhost', 'root', '', 'gds');
                                    
                                        //mengambil data ke tabel biodata
                                        $select     = mysqli_query($koneksi, 'select * from students');
                                    
                                        //melakukan looping dengan while
                                        while ($hasil = mysqli_fetch_array($select)) {
                                    ?>

                                    <option value="<?php echo $hasil['id'];?>"><?php echo $hasil['nis'] . ' - ' . $hasil['name']  . ' - ' . $hasil['gender']  . ' - ' . $hasil['rayon']  . ' - ' . $hasil['rombel'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <select class="form-control form-control-select" name="description" id="description">
                                    <option value=""></option>
                                    <option value="atribut">Atribut</option>
                                    <option value="makanan">Makanan</option>
                                    <option value="make up">Make Up</option>
                                    <option value="tisu">Tisu</option>
                                    <option value="terlambat">Terlambat</option>
                                </select>
                            </div>

                            <!-- kamera webcam akan ditampilkan di dalam id="my_camera" -->
                            
                            <div id="my_camera">
                            </div>
                            <br>
                            <hr>
                            <button type="submit" class="tombol-simpan btn btn-primary">Register</button>
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
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- bootstrap js  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- webcamjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
        // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
        Webcam.set({
            width: 320,
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
        $("#student_id").on('change', function(){
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
</body>

</html>