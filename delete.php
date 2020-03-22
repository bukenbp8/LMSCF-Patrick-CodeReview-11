<?php 
    require_once 'includes/dbh.inc.php';

    if ($_GET['id'] && $_GET['id2'] && $_GET['id3']) {
        $id = $_GET['id'];
        $id2 = $_GET['id2'];
        $id3 = $_GET['id3'];
     
        $sql = "SELECT * FROM media WHERE idMedia = {$id}";
        $sql2 = "SELECT * FROM authors WHERE authorID = {$id2}";
        $sql3 = "SELECT * FROM publisher WHERE idPublisher = {$id3}";
        
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
     
        $data = $result->fetch_assoc();
        $data2 = $result2->fetch_assoc();
        $data3 = $result3->fetch_assoc();
     
        $conn->close();
    }     
?>

<h3>Do you really want to delete this user?</h3>
<form action ="actions/a_delete.php" method="post" class="alert alert-danger">
    <input type="hidden" name="id" value= "<?php echo $data['idMedia']; ?>" />
    <input type="hidden" name="id2" value= "<?php echo $data2['authorID']; ?>" />
    <input type="hidden" name="id3" value= "<?php echo $data3['idPublisher']; ?>" />
    <button type="submit" class="btn btn-danger">Yes, delete it!</button >
    <a href="index.php"><button type="button" class="btn btn-primary">No, go back!</button ></a>
</form>