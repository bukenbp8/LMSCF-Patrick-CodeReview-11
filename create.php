<?php 
    require "header.php";
?>

<main>
    <div class="container mt-4 col-md-8">
        <h2 class="mt-4 mb-4">Create Media</h2>
        <form class="form-group bg-light rounded p-4 pr-5 pl-5" action="actions/a_create.php"  method="post">
            <label>Media Title</label>
            <input type="text" name="title" class="form-control mb-2">
            <label>Image Link</label>
            <input type="text" name="img"  class="form-control mb-2">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control mb-2"">
            <label>Description</label>
            <input type="text" name="descr" class="form-control mb-2">
            <label>Release Date</label>
            <input type="text" name="pubDate" class="form-control mb-2">
            <div class="form-group">
                <label>Media Type</label>
                <select class="form-control" name="typeMedia" >
                    <option value="Book">Book</option>
                    <option value="DVD">DVD</option>
                    <option value="CD">CD</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="statusM" >
                    <option value="Available">Available</option>
                    <option value="Not available">Not available</option>
                </select>
            </div>
            <label>Author's First Name</label>
            <input type="text" name="fname" class="form-control mb-2">
            <label>Author's Last Name</label>
            <input type="text" name="lname" class="form-control mb-2">
            <label>Publisher</label>
            <input type="text" name="pubName" class="form-control mb-2">
            <div class="form-group">
                <label>Publisher Size</label>
                <select class="form-control" name="size" >
                    <option value="small">small</option>
                    <option value="medium">medium</option>
                    <option value="big">big</option>
                </select>
            </div>
            <label>Publisher Address</label>
            <input type="text" name="pubAddr" class="form-control mb-2">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="index.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</main>