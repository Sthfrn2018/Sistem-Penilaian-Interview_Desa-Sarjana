<?php
    session_start();
    date_default_timezone_set('Asia/Jakarta');
    $host   = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db   = 'desasarjana';

    if(mysql_connect($host, $user, $pass)){
        if(!mysql_select_db($db)){
            echo 'kesalahan koneksi database '.mysql_error();
        }
    }else{
        echo 'kesalahan server '.mysql_error();
    }

    function base_url($value='')
    {
        $root = "http://".$_SERVER['HTTP_HOST'];
        $root .= $_SERVER['REQUEST_URI'];
        $root .= $value;
        return $root;
    }

    function pesan($v, $m)
    {
        echo '<script>';
        if($v==''){
            echo "alert('$m');";
        }else if ($m==''){
            echo "document.location='$v';";
        }else{
            echo "alert('$m');";
            echo "document.localhost='$v';";
        }
        echo '</script>';
    }

    function get_user()
    {
        $v = $_SESSION[md5('admin')];
        $data = mysql_query("SELECT * FROM pengguna WHERE username = '$v' ");
        $row = mysql_fetch_array($data);
        return $row['nama'];
    }

    function get_hak_akses()
    {
        $v = $_SESSION[md5('admin')];
        $data = mysql_query("SELECT * FROM pengguna WHERE username = '$v' ");
        $row = mysql_fetch_array($data);
        return $row['hak_akses'];
    }

?>