<?php 
    require_once 'includes/dbh.inc.php';

    if ($_GET['id']) {
        $id = $_GET['id'];
     
        $sql = "SELECT * FROM animals WHERE id = {$id}";
        
        $result = $conn->query($sql);
     
        $data = $result->fetch_assoc();
     
        $conn->close();
    }     
?>

<h3>Do you really want to delete this animal?</h3>
<form action ="actions/a_delete.php" method="post" class="alert alert-danger">
    <input type="hidden" name="id" value= "<?php echo $data['id']; ?>" />
    <button type="submit" class="btn btn-danger">Yes, delete it!</button >
    <a href="index.php"><button type="button" class="btn btn-primary">No, go back!</button ></a>
</form>