<?php 
    include "connection.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stat = $db->prepare("select * from tbl_file where id=?");
        $stat->bindParam(1,$id);
        $stat->execute();
        $data = $stat->fetch();

        $file = 'media/'.$data['name'];

        if (file_exists($file)) {
            header('Content-name: '. $data['name']);
            header('Content-image: '. $data['image']);
            readfile($file);
            exit;
        }
    }
