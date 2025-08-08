<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Insert and Upload Successful!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Upload Image</h4>
                </div>

                <div class="card-body">
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="image" class="form-label">Choose an Image:</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-success w-25">Submit</button>
                            <a href="view.php" class="btn btn-secondary w-25">View</a>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>
<?php 
$show_modal = false;

if(isset($_FILES['image'])){
    $myfile = $_FILES['image'];
    include 'db.php';
    $file_name = $myfile['name']; 
    $query_insert = "INSERT INTO tbl_img(name) VALUES ('$file_name')";
    $query_insert_run = mysqli_query($conn, $query_insert);

    if($query_insert_run){
        $target = 'upload/' . basename($myfile['name']);
        if(move_uploaded_file($myfile['tmp_name'], $target)){
            $show_modal = true;
        } else {
            echo '<div class="text-center text-danger mt-3">Cannot Upload.</div>';
        }
    }
}
if ($show_modal) {
    echo "
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        });
    </script>
    ";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
