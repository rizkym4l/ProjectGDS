<?php
        //koneksi ke database
        $koneksi = new mysqli('localhost', 'root', '', 'gds');
    
        //menangkap variabel
        $student_id     = $_GET['student_id'];

        // select data
        $select     = mysqli_query($koneksi, 'select * from students where id = "' . $student_id . '" limit 1');
        //LIMIT 1 memastikan bahwa Anda hanya mengambil satu catatan meskipun ada beberapa siswa dengan id yang sama 
        
        // hasil
        echo json_encode(mysqli_fetch_array($select));
?>