<?php
    session_start();
    require "../classes/User.php";

    $user_obj = new User;
    $user = $user_obj->getUser($_SESSION['id']);  //$_SESSION['id']-> the id of the current logged in user

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
              <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name']?></span>
                <form action="../actions/logout.php" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent boarder-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">Edit User</h2>

            <form action="../actions/edit-user-action.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php
                        if($user['photo']){
                        ?>

                            <img src="../assets/images/<?= $user['photo']?>"  alt="<?= $user['photo']?>" class="d-block mx-auto edit-photo">

                            <?php
                            }else {
                        ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                            <?php
                            }
                            ?>

                            <input type="file" name="photo" class="form-control mt-2" accept="image/*">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="first-name" class="form-label">Firstname</label>
                    <input type="text" name="first_name" id="first-name" value="<?= $user['first_name'] ?>" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="last-name" class="form-label">Lastname</label>
                    <input type="text" name="last_name" id="last-name" value="<?= $user['last_name'] ?>" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" name="username" id="username"  class="form-control fw-bold" max-length="15" value="<?= $user['username'] ?>" required>
                </div>

                <div class="text-end">
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm">Save</button>
                </div>
            </form>
        </div>
    </main>
    
</body>
</html>