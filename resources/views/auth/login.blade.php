<!doctype html>
<html lang="en">
<head>
    <title>Encuestas Virtuales</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/log/style.css">

</head>
<body class="img js-fullheight" style="background-image: url(log/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Encuestas Virtuales</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Sientete Seguro</h3>
                    <form action="{{ route('login') }}" class="signin-form" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="/log/js/jquery.min.js"></script>
<script src="/log/js/popper.js"></script>
<script src="/log/js/bootstrap.min.js"></script>
<script src="/log/js/main.js"></script>

</body>
</html>
