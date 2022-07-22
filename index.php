<?php
  $email_address = "duychating@gmail.com";
  $api_key_value = "01213995603";
  $api_key = $value1 = $value2 = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);

    if ($api_key == $api_key_value) {
      $value1 = test_input($_POST["value1"]);
      $value2 = test_input($_POST["value2"]);

      // Email message
      $email_msg = "Temperature: " . $value1 . 
                    "℃\Humidity" . $value2 . "%";

      $email_msg = wordwrap($email_msg, 70);

      // Send email with mail(receiver email address, email subject, email message)
      // mail($email_address, "[New] ESP DHT22 Readings", $email_msg);

      // echo "Email Sent";
      echo $email_msg;
    }
    else {
      echo "Wrong API Key provided.";
    }
  }
  else {
    echo "No data posted with HTTP POST.";
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

