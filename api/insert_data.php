<?php
include '../src/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $plot_id = $_GET['plot_id'];
    $nitrogen = $_GET['nitrogen'];
    $phosphorous = $_GET['phosphorous'];
    $potassium = $_GET['potassium'];
    $moisture = $_GET['moisture'];

    // 1. Insert NPK data
    $sql = "INSERT INTO npk_table(plot_id, nitrogen, phosphorus, potassium, moisture)
            VALUES ('$plot_id', '$nitrogen', '$phosphorous', '$potassium', '$moisture')";
    $result = $mysqli->query($sql);

    if ($result) {
        // 2. Get the email associated with the plot_id
        $email_sql = "SELECT accounts.email 
                      FROM accounts 
                      JOIN plots ON accounts.id = plots.owner_id 
                      WHERE plots.id = '$plot_id' LIMIT 1";
        $email_result = $mysqli->query($email_sql);

        if ($email_result && $email_row = $email_result->fetch_assoc()) {
            $email = $email_row['email'];
            $message = "";
            $remarks = "";

            // 3. Build the npk_mail.php URL
           $mail_url = "https://npk.ets-dev.com/npk_mail.php?email=" . urlencode($email) .
            "&message=" . urlencode($message) .
            "&remarks=" . urlencode($remarks) .
            "&plot_id=" . urlencode($plot_id);

            // 4. Trigger email
            $mail_response = file_get_contents($mail_url);

            echo json_encode([
                'success' => '1',
                'mail_response' => $mail_response
            ]);
        } else {
            echo json_encode([
                'success' => '1',
                'message' => 'Data inserted but no email found for this plot.'
            ]);
        }
    } else {
        echo json_encode(['success' => '0', 'error' => $mysqli->error]);
    }

    $mysqli->close();
}
?>
