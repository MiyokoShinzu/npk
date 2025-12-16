<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Login</title>

    <link href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-white">
    <main class="d-flex w-100 bg-white">
        <div class="container d-flex flex-column">
            <div class="row mt-2">
                <div class="col-11 col-lg-7 text-center mx-auto mt-1">
                    <img src="./assets/gg-logo.png" alt="" class="mt-3" style="height: 100px; width: 100px;">
                    <h1 class="mt-2">Web-based Soil NPK Analyzer</h1>
                </div>
                <div class="col-sm-10 col-md-6 col-xl-6 mx-auto d-table mt-2">
                    <div class="d-table-cell align-middle">

                        <div class="text-center">
                            <h1>Welcome!</h1>
                            <p class="lead">
                                Log in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">

                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-weight: bold;">Email</label>
                                            <input class="form-control form-control-lg" type="email" id="email" placeholder="Enter your email" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-weight: bold;">Password</label>
                                            <input class="form-control form-control-lg" type="password" id="password" placeholder="Enter your password" required />
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <button id="submit_btn" class="btn btn-lg btn-primary">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        $(document).on("click", '#submit_btn', function() {
            var email = $("#email").val()
            var password = $("#password").val()
            if (email == "admin@gmail.com" && password == '0000') {
                alert("Login Successful");
            } else {
                alert("Error logging in. Password incorrect");
            }
        })
    </script>
</body>

</html>