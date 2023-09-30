<?php



include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();
include('includes/header.php');

if (isset($_POST['title'])){
    if($stm = $connect->prepare('INSERT INTO posts (title,content,author,date) VALUES(?,?,?,?)')){ 
        $stm->bind_param('ssis', $_POST['title'], $_POST['content'], $_SESSION['id'], $_POST['date']);
        $stm->execute();

        set_message("A New POST " . $_SESSION['username'] . " has been added");
        header('Location: posts.php');
        $stm->close();
        die();

    } 

else{
    echo 'Could not prepare Statement!';
}
}
    



    

?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
    <h1 class="display-1">Add Post</h1>
    
    <form method="post">
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="email">Title</label>
                </div>

                <!-- Content input -->
                <div class="form-outline mb-4">
                   <textarea name="content" id="content"></textarea>
                </div>

                <!-- Date Select -->
                <div class="form-outline mb-4">
                <input type="date" id="password" name="date" class="form-control" />
                <label class="form-label" for="date">Date</label>
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Add Post</button>   
           
       
            </div>
        </div>
    </div>
</div>


<script src="js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content'
    });
</script>
<?php
include('includes/footer.php');
?>