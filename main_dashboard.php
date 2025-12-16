<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex align-items-center justify-content-center">
        <div class="row w-100 min-vh-100">
            <div data-aos="fade-down" class="col-lg-5 col-11 mx-auto h-auto d-flex flex-column align-items-center justify-content-center">
                <img id="logo" src="./assets/gg-logo.png" alt="" class="img-fluid">
                <h1 class="text-center w-100" style="font-weight: bolder;font-size: 3em; color: #195491">GRAIN GUARD</h1>
            </div>
        </div>
    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <style>
        #logo {
            animation: animate 1s linear infinite alternate;
        }

        @keyframes animate {
            0% {

                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    <script>
        setTimeout(() => {
            location.replace("login.php")
        }, 3000)
    </script>
</body>

</html>