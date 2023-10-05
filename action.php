<?php
        //mendefinisikan folder
        define('UPLOAD_DIR', 'upload/');
    
        //koneksi ke database
        $koneksi = new mysqli('localhost', 'root', '', 'gds');
    
        //menangkap variabel
        $img            = $_POST['image'];
        $student_id     = $_POST['student_id'];
        $description    = $_POST['description'];
    
        $img        = str_replace('data:image/jpeg;base64,', '', $img);
        $img        = str_replace(' ', '+', $img);
    
        //resource gambar diubah dari encode
        $data       = base64_decode($img);
    
        //menamai file, file dinamai secara random dengan unik
        $file       = uniqid() . '.png';
        
        //memindahkan file ke folder upload
        file_put_contents(UPLOAD_DIR.$file, $data);
    
        //memasukkan data ke dalam tabel biodata
        mysqli_query($koneksi, "insert into violations values(null, '$student_id', '$description', '$file')");
?>
