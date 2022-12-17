<?php
// Include config file
require_once "includes/dbh.inc.php";
require_once "header.php";

// Define variables and initialize with empty values
$gearId = $gearType = "";
$gearId_err = $gearType_err = "";
$userID = $_SESSION['userid'];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_gearId = trim($_POST["gearId"]);
    if(empty($input_gearId)){
        $gearId_err = "Please enter an ID.";
    } elseif(!filter_var($input_gearId, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]*$/")))){
        $gearId_err = "Please enter a valid ID.";
    } else{
        $name = $input_gearId;
    }

    // Validate address
    $input_gearType = trim($_POST["gearType"]);
    if(empty($input_gearType)){
        $gearType_err = "Please enter an type.";
    } else{
        $gearType = $input_gearType;
    }


    // Check input errors before inserting in database
    if(empty($gearId_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO gear (gearID, user_id, gearType) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_gearID, $param_user_id, $param_gearType);

            // Set parameters
            $param_gearID = $gearId;
            $param_user_id = $userID;
            $param_gearType = $gearType;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: gear.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Create Record</h2>
                <p>Please fill this form and submit to add gear records to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Gear ID</label>
                        <input type="text" name="gearId" class="form-control <?php echo (!empty($gearId_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gearId; ?>">
                        <span class="invalid-feedback"><?php echo $gearId_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Gear Type</label>
                        <textarea name="gearType" class="form-control <?php echo (!empty($gearType_err)) ? 'is-invalid' : ''; ?>"><?php echo $gearType; ?></textarea>
                        <span class="invalid-feedback"><?php echo $gearType_err;?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="gear.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>