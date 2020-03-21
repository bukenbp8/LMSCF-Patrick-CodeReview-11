<?php 
    require_once 'includes/dbh.inc.php';
    require "header.php";

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

<main>
    <div class="container mt-4 col-md-8">
        <h2 class="mt-4 mb-4">Edit Media</h2>
        <form class="form-group bg-light rounded p-4 pr-5 pl-5" action="actions/a_edit.php"  method="post">
            <label>Media Title</label>
            <input type="text" name="title" class="form-control mb-2" value="<?php echo $data['titelMedia']; ?>">
            <label>Image Link</label>
            <input type="text" name="img"  class="form-control mb-2" value="<?php echo $data['imgMedia']; ?>">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control mb-2" value="<?php echo $data['isbnMedia']; ?>">
            <label>Description</label>
            <input type="text" name="descr" class="form-control mb-2" value="<?php echo $data['descMedia']; ?>">
            <label>Release Date</label>
            <input type="text" name="pubDate" class="form-control mb-2" value="<?php echo $data['publDateMedia']; ?>">
            <div class="form-group">
                <label>Media Type</label>
                <select class="form-control" name="typeMedia" >
                    <option value="<?php echo $data['typeMedia']; ?>"><?php echo $data['typeMedia']; ?></option>
                    <option value="Book">Book</option>
                    <option value="DVD">DVD</option>
                    <option value="CD">CD</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="statusM" >
                    <option value="<?php echo $data['statusMedia']; ?>"><?php echo $data['statusMedia']; ?></option>
                    <option value="Available">Available</option>
                    <option value="Not available">Not available</option>
                </select>
            </div>
            <label>Author's First Name</label>
            <input type="text" name="fname" class="form-control mb-2" value="<?php echo $data2['firstNameAuthor']; ?>">
            <label>Author's Last Name</label>
            <input type="text" name="lname" class="form-control mb-2" value="<?php echo $data2['lastNameAuthor']; ?>">
            <label>Publisher</label>
            <input type="text" name="pubName" class="form-control mb-2" value="<?php echo $data3['namePublisher']; ?>">
            <div class="form-group">
                <label>Publisher Size</label>
                <select class="form-control" name="size" >
                    <option value="<?php echo $data3['sizePublisher']; ?>"><?php echo $data3['sizePublisher']; ?></option>
                    <option value="small">small</option>
                    <option value="medium">medium</option>
                    <option value="big">big</option>
                </select>
            </div>
            <label>Publisher Address</label>
            <input type="text" name="pubAddr" class="form-control mb-2" value="<?php echo $data3['addressPublisher']; ?>">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-primary">Back</a>
            <input type="hidden" name="id" value= "<?php echo $data['idMedia']; ?>" />
            <input type="hidden" name="id2" value= "<?php echo $data2['authorID']; ?>" />
            <input type="hidden" name="id3" value= "<?php echo $data3['idPublisher']; ?>" />
        </form>
    </div>
</main>

