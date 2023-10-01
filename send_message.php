<?php
// Replace 'YOUR_BOT_TOKEN' with your actual bot token
$botToken = '6322549743:AAG0rjR1GWzE9bLw9IFGJ6VP34PQRaMaVQU';

// Get user input from the HTML form
$username = $_POST['username'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Construct the message to send to Telegram
$message = "Username: $username\nAddress: $address\nPhone Number: $phone";

// Set the Telegram API endpoint
$apiEndpoint = "https://api.telegram.org/bot$botToken/sendMessage";

// Set the chat ID where you want to send the message
$chatId = '-1001889480425';

// Prepare the data to send to Telegram
$data = [
    'chat_id' => $chatId,
    'text' => $message,
];

// Use cURL to send the data to the Telegram API
$ch = curl_init($apiEndpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo 'Message sent successfully!';
}

curl_close($ch);
?>

