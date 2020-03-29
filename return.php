<?php 
    require_once 'includes/dbh.inc.php';
    require "header.php";

    if ($_GET['id'] && $_GET['id2']){
        $id = $_GET['id']; 
        $id2 = $_GET['id2'];    
        
        $sql = "SELECT * FROM adopt WHERE id_a = $id";
        $sql2 = "SELECT * FROM animals WHERE id = $id2"; 
        
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);

        $data = $result->fetch_assoc();
        $data2 = $result2->fetch_assoc();

        $conn->close();
    }     
?>

<h3>Do you want to give this Item back?</h3>
<form action ="actions/a_return.php" method="post" class="alert alert-danger">
    <input type="hidden" name="id" value= "<?php echo $data['id_a']; ?>" />
    <input type="hidden" name="id2" value= "<?php echo $data2['id']; ?>" />
    <button type="submit" class="btn btn-danger">Yes, give it back!</button >
    <a href="my_media.php"><button type="button" class="btn btn-primary">No, go back!</button ></a>
</form>