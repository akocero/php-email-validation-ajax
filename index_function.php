<?php
date_default_timezone_set('Asia/Manila');
$dateNow = date("Y-m-d H:i:s");

if (isset($_POST['key'])) {

    if ($_POST['key'] == 'validate_email') {


        $email = $_POST["input_email"];
        $emailErr = true;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = false;
        }


        $jsonArray = array(
            'email' => $email,
            'status' => $emailErr,
            'date' => $dateNow
        );
        $status = 'false';
        if ($emailErr) {
            $status = 'true';
        }

        $data = [
            [$dateNow, $email, $status]
        ];

        $filename = 'logs.csv';

        // open csv file for writing
        $f = fopen($filename, 'w');

        if (
            $f === false
        ) {
            die('Error opening the file ' . $filename);
        }

        // write each row at a time to a file
        foreach ($data as $row) {
            fputcsv(
                $f,
                $row
            );
        }

        // close the file
        fclose($f);

        exit(json_encode($jsonArray));
    }
}
