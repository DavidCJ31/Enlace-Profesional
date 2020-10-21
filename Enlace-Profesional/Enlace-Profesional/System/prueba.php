<?php 
require 'constants/settings.php'; 
require 'constants/db_config.php';
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id=NULL ORDER BY state_name");
    $stmt->execute();
    $result = $stmt->fetchAll();
    echo "<select>";
    foreach($result as $row)
    {
    //$cat = $row['state_name'];
   ?>
   <option value="<?php echo $row['id']; ?>"><?php echo $row['state_name']; ?></option>
   <?php
    }
    $stmt->execute();

    }catch(PDOException $e)
    {

    }

    echo "</select>";
?>
