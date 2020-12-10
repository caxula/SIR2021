<!DOCTYPE html>
<html lang="en">

<?php require_once('./components/head.php') ?>

<body>
  <?php require_once('./components/nav.php') ?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <form id="form">
            <div class="form-group">
              <label for="image">Post image</label>
              <input type="file" class="form-control-file" id="image" />
            </div>
            <div class="form-group">
              <label for="title">Post title</label>
              <input autocomplete="off" type="text" class="form-control" id="title" />
            </div>
            <div class="form-group">
              <label for="text">Post text</label>
              <textarea class="form-control" id="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
  <?php require_once('./components/import.php') ?>
  <script src="js/newPost.js"></script>
</html>
