
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<style>
    .table{
        padding-right: 70%;
    }
</style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Tambahkan gambar di sini -->
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Rayon</th>
                        <th>Rombel</th>
                     x   <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //koneksi ke database
                    $koneksi = new mysqli('localhost', 'root', '', 'gds');

                    //mengambil data ke tabel biodata
                    $select = mysqli_query($koneksi, 'select students.*, violations.description, violations.image from violations join students on violations.student_id = students.id');

                    //melakukan looping dengan while
                    while ($hasil = mysqli_fetch_array($select)) {
                        ?>
                        <tr>
                        <td><img src='upload/<?php echo $hasil['image']; ?>' width="100%" /></td>
                            <td><?php echo $hasil['name']; ?></td>
                            <td><?php echo $hasil['gender']; ?></td>
                            <td><?php echo $hasil['rayon']; ?></td>
                            <td><?php echo $hasil['rombel']; ?></td>
                            <td><?php echo $hasil['description']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



