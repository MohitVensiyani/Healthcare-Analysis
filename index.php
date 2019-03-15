<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


<?php
// Load the database configuration file
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Members data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-md-8">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

<div class="row">
  <div  class="col-md-10">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
        </div>
    </div>
    <!-- CSV file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form action="importData.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
    </div>
    <br><br><br>

    <!-- Data list table -->


    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#ID</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Disease</th>
                <th>Region</th>
                <th>Medicine</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        $result = $db->query("SELECT * FROM Sample1 ORDER BY id DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Age']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Disease']; ?></td>
                <td><?php echo $row['Region']; ?></td>
                <td><?php echo $row['Medicines']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
<br>
<br>
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Region</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Get member rows
    $newresult = $db->query("SELECT Region, Age FROM healthcare");
    if($newresult->num_rows >= 0){
        while($row = $newresult->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $row['Region']; ?></td>
            <td><?php echo $row['Age']; ?></td>
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="5">No member(s) found...</td></tr>
    <?php } ?>
    </tbody>
</table>
    </div>
</div>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
