<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$text_array =
    array(
        "of the 30th batch, the Department of Law, Feni University is thanked",
        "for his outstanding volunteering contribution to the Maiden Convocation,",
        "held on 23 September 2023, at Feni University as part of the ",
        "Discipline Sub-committee."
    );
// multiline($text);
// exit();
try {
    $MD = array_merge($_POST, $_GET);
    $name = isset($MD['name']) ? $MD['name'] : "Shazzad Hossain Mazumder";
    $membershipid = isset($MD['membershipid']) ? $MD['membershipid'] : "";
    $watermark = "cu-alumni.org";

    //Set the Content Type
    header('Content-type: image/jpeg');

    // Create Image From Existing File
    $img = dirname(__FILE__) . "/cert.jpg";
    $jpg_image = imagecreatefromjpeg($img);

    // Allocate A Color For The Text
    $white = imagecolorallocate($jpg_image, 255, 255, 255);
    $black = imagecolorallocate($jpg_image, 0, 0, 0);

    // Set Path to Font File
    $font_path = './OpenSans-Bold.ttf';

    // Set Text to Be Printed On Image
    $name = trim($name);
    $name_len = strlen($name);
    // Print Text On Image
    imagettftext($jpg_image, 40, 0, 850 - ceil($name_len * 35 / 2), 650, $black, $font_path, strtoupper($name));

    // $text_array = multiline($text);

    for ($i = 0; $i < count($text_array); $i++) {
        $t = $text_array[$i];
        $len = strlen($t);
        // echo $t;
        // echo $len;

        imagettftext($jpg_image, 30, 0, 850 - ceil($len * 25 / 2), 750 + 40 * $i, $black, $font_path, $t);
    }

    // imagettftext($jpg_image, 25, 0, 980, 800, $white, $font_path, $watermark);

    // Send Image to Browser
    imagejpeg($jpg_image);

    // Clear Memory
    imagedestroy($jpg_image);
} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}

function multiline($text)
{
    $text_parts = explode(" ", $text);

    $lines = array();
    $tmpname = "";
    $lastIndex = 0;
    for ($idx = 0; $idx < count($text_parts); $idx++) {
        # code...
        $tmpname = array_slice($text_parts, $lastIndex, $idx + 1);

        $tmpname = implode(" ", $tmpname);
        if (strlen($tmpname) > 40) {
            $lines[] = $tmpname;
            $lastIndex = $idx + 1;
        } else {
        }
        // $name = $tmpname;
    }

    if (strlen($tmpname)) {
        $lines[] = $tmpname;
    }

    var_dump($lines);
    return $lines;
}

function comma($name)
{
    $name_parts = explode(" ", $name);
    for ($idx = 0; $idx < count($name_parts); $idx++) {
        # code...
        $tmpname = array_slice($name_parts, 0, $idx + 1);
        $tmpname = implode(" ", $tmpname);
        if (strlen($tmpname) > 18) {
            break;
        }
        $name = $tmpname;
    }

    if (!strlen($name)) {
        $name = implode(" ", $name_parts);
    }

    $name .= ",";

    return $name;
}
