<!-- Bootstrap library -->
<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){

    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $age   = $line[0];
                $gender  = $line[1];
                $disease  = $line[2];
                $region = $line[3];
                $medicine = $line[4];

                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM Sample1 WHERE age = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);

                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE Sample1 SET Age = '".$age."', Gender = '".$Gender."', Disease = '".$disease."', Region = '".$region."', Medicines = '".$medicine."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO Sample1 (Age, Gender, Disease, Region, Medicines) VALUES ('".$age."', '".$gender."', '".$disease."', '".$region."', '".$medicine."')");
                }
            }

            // Close opened CSV file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: index.php".$qstring);
