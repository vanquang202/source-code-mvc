<?php

use App\Middlewares\Kener;

require_once '../constans/session.php';

/**
 * 
 */
date_default_timezone_set('Asia/Ho_Chi_Minh');
$url = $_GET['url'] ?? '/';

$KENNER = new Kener();

//Redirect
function redirect(string $link): void
{
    $url = env("URL");
    header('Location:' . $url . $link);
}


/**
 * 
 */
function layout(string $data)
{
    require '../app/Views/layouts/' . $data . '.php';
}

/** 
 * 
 * Serve global request
 * 
 */
function request(string $key): string
{
    return [
        'url' => $_GET['url'] ?? '/',
        'gruop' => $_SESSION['SERVER']['GRUOP'] ?? '',
        'prefix' => $_SESSION['SERVER']['PREFIX'] ?? '',
    ][$key];
}

//Config globla
function env($key)
{
    return (require '../env.php')[$key];
}


//Var_dump
function dd(mixed $arg): void
{
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
    die;
}


//View
function view(string $view, array $data = []): void
{
    extract($data);
    $view = explode('.', $view);
    $view = implode('/', $view);
    echo require_once "../app/Views/" . $view . ".php";
}





//Upload file 
function uploadFile(mixed $img)
{

    // $imageNameImage = uniqid() . "." . end(explode(".", $img['name']));
    if (isset($img['name'])) {
        $imageNameImage = uniqid() . $img['name'];
        move_uploaded_file($img['tmp_name'], '../public/images/' . $imageNameImage);
        return $imageNameImage;
    }
    return null;
}


// Time ago
function formatTime($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "just now";
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 phút trước";
        } else {
            return "$minutes phút trước";
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            return "1 giờ ";
        } else {
            return "$hours giờ ";
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "Hôm qua";
        } else {
            return "$days ngày ";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "1 tuần ";
        } else {
            return "$weeks tuần ";
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            return "1 tháng ";
        } else {
            return "$months tháng ";
        }
    }
    //Years
    else {
        if ($years == 1) {
            return "1 năm ";
        } else {
            return "$years năm ";
        }
    }
}