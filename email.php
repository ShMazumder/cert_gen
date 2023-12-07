<?php

if (!isset($_POST['email']) || !isset($_FILES['attachment'])) {
    echo "Please provide email and certificate!";
    exit();
}

$from_email = 'fu.cse@shmazumder.online'; //from mail, sender email address
$recipient_email = $_POST["email"]; //recipient email address

//Load POST data from HTML form
$sender_name = "Department of CSE, Feni University"; //sender name
$reply_to_email = "busrat@feniuniversity.ac.bd"; //sender email, it will be used in "reply-to" header
$subject     = $_POST["subject"]; //subject for the email
$message     = $_POST["message"]; //body of the email


$file_path = $_FILES['attachment']['tmp_name'];

// $content = $_POST['attachment'];
$content = base64_encode(file_get_contents($file_path));
$encoded_content = chunk_split($content);

$boundary = md5("random"); // define boundary with a md5 hashed value

//header
$headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
$headers .= "From:" . $from_email . "\r\n"; // Sender Email
$headers .= "Reply-To: " . $reply_to_email . "\r\n"; // Email address to reach back
// $headers .= "Cc: ".$reply_to_email."\r\n";
$headers .= "Bcc: "."shmazumder23@gmail.com"."\r\n";
$headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
$headers .= "boundary = $boundary\r\n"; //Defining the Boundary

//plain text
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
$body .= chunk_split(base64_encode($message));

// //attachment
// $body .= "--$boundary\r\n";
// $body .= "Content-Type: image/jpeg; name=" . "certificate.jpeg" . "\r\n";
// $body .= "Content-Disposition: attachment; filename=" . "certificate.jpeg" . "\r\n";
// $body .= "Content-Transfer-Encoding: base64\r\n";
// $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
// $body .= $encoded_content; // Attaching the encoded file with email

//attachment

$filename = "certificate.jpeg";
$body .= "--$boundary\r\n";
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"\r\n";
$body .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
$body .= $encoded_content; // Attaching the encoded file with email


$sentMailResult = mail($recipient_email, $subject, $body, $headers);

$response = array();

if ($sentMailResult) {
    // echo "<h3>File Sent Successfully.<h3>";
    // unlink($name); // delete the file after attachment sent.

    $response['error'] = false;
} else {
    die("Sorry but the email could not be sent.
					Please go back and try again!");
    $response['error'] = true;
}


echo json_encode($response);
