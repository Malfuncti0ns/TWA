<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Week 9 Exercise 3</title>
</head>

<body>
    <?php
    $titlestr = $_POST["title_type"];
    $fnamestr = $_POST["fname"];
    $lnamestr = $_POST["lname"];    
    $dobstr = $_POST["dob"];
    $sexstr = $_POST["Sex"];
    $country = $_POST["bCountry"];
    $martialstat = $_POST["mstatus"];
    $crep = $_POST["cvisit"];
    $native = $_POST["nationf"];
    $addressstr = $_POST["addressL1"];
    $suburbstr = $_POST["suburb"];
    $statestr = $_POST["state"];
    $postc = $_POST["postcode"];
    $hphonestr = $_POST["hphone"];
    $mobile = $_POST["mphone"];
    $mediNo = $_POST["kin_medino"];
    $mediID = $_POST["kin_mediid"];
    $mediexp = $_POST["kin_medexp"];
    ?>

    <h3>Patient Registration Details</h3>
    <p><?php echo "$titlestr $fnamestr $lnamestr"; ?>, thank you for registering
    as a new patient at our medical practice. Please check that the following details are
    correct. If you make note of any errors, please speak to our reception staff to amend.</p>

    <p>Full name: <?php echo "$titlestr $fnamestr $lnamestr ($martialstat)"; ?></p>
    <p>Address:     
    <?php echo $addressstr; ?><br>
    <?php echo $suburbstr; ?><br>
    <?php echo $statestr; ?><br>
    <?php echo $postc; ?></p>
    <p>Date of Birth: <?php echo "$dobstr"; ?></p>
    <p>Home phone: <?php echo "$hphonestr";?>       Mobile Phone: <?php echo "$mobile";?></p>
    <p>Medicare: <?php echo"$mediNo" - "$mediID";?>     Expiry: <?php echo"$mediexp";?></p>
    <p>Birth Country: <?php echo "$country"?></p>

//Running out of time, error checking not in place. Blank values are spitting out errors referring to lines because nothing has been input to assist

</body>

</html>