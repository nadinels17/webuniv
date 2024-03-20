<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Univ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<style>
body {
    background-color: pink;
}

.row {
    margin-top: 100px;
    margin-left: 200px;
}
</style>

<body>

    <div class="row">

        <div class="col">
            <div class="card" style="width: 16rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                    class="bi bi-person-circle mt-2 mx-5" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <hr>
                <div class="card-body">
                    <h5 class="card-title text-center"><a href="admin/login.php"
                            style="text-decoration:none; color:black;">
                            Admin </a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 16rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor"
                    class="bi bi-person-circle mt-2 mx-5" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <hr>
                <div class="card-body">
                    <h5 class="card-title text-center"><a href="user/login.php"
                            style="text-decoration:none; color:black;"> User </a></h5>
                </div>
            </div>
        </div>


</body>

</html>