<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
session_destroy();

$icon = 'success';
$title = 'Anda Berhasil Keluar Dari Sistem';
$halaman = 'home';

gagal($icon, $title, $halaman);
