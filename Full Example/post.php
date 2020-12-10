<!DOCTYPE html>
<html lang="en">

  <?php require_once('./components/head.php') ?>

  <body>
  
  <?php require_once('./components/nav.php') ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row align-center">

      <!-- Post Content Column -->
      <div class="col-lg-8 mb-4">
        <div class="text-center">
            <h1 class="mt-4" id="title" contenteditable="true">Post Title</h1>
            <hr>
            <p id="date">Posted on January 1, 2019 at 12:00 PM</p>
            <hr>
            <img class="img-fluid rounded" id="image">
            <hr>
            <p class="lead" id="text" contenteditable="true"></p>
            <hr>
            <button type="button" id="delete" class="btn btn-danger">Delete post</button>
            <button type="button" id="update" class="btn btn-success">Update post</button>
            <!-- Comments Form -->
            <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form id="form">
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control" id="name" placeholder="Name" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="comment" rows="3" placeholder="Comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </div>
        </div>

        <div id="comments">
            <!-- Comments -->
        </div>


      </div>
    </div>
  </div>

  <?php require_once('./components/import.php') ?>
  <script src="js/post.js"></script>
</body>

</html>
