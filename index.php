<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <form class="container w-50 text-center justify-content-center align-items-center" action="validate.php" method="post">
        <!-- Name field -->
        <div class="row p-3">
            <div class="col-3">
                <label for="name" class="form-label fs-3">Name</label>
            </div>
            <div class="col">
                <input type="text" class="form-label" name="name" placeholder="Enter your name" required>
            </div>
        </div>
        <!-- Password field -->
        <div class="row p-3">
            <div class="col-3">
                <label for="password" class="form-label fs-3">Password</label>
            </div>
            <div class="col">
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
        </div>
        <div class="row p-3">
            <p>Don't have an account? <span class="text-success">register</span></p>
        </div>
        <div class="row-3 p-3">
            <input type="submit" name="submit" class="btn bg-primary" value="Login">
        </div>
    </form>
</body>

</html>