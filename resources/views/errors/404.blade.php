<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERROR 404!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 col-md-4 left-error ">
                <div class="row align-items-center justify-content-center justify-content-md-end me-md-3">
                    <div class="col-8  text-center white-bg border border-dark border-2 shadow-error rounded-2 px-3 py-5">
                        <img class="img-fluid img-error mb-3" src="../image/logo1.png" alt="logo">
                        <h2 class="fw-bolder">{{ __('ui.error_Title') }}</h2><hr>
                        <p class="my-4 mx-3">{{ __('ui.error_Text') }}</p>
                        <p class="my-4">{{ __('ui.error_Home') }}</p>
                        <a href="{{route('welcome')}}" class="btn main-btn">Homepage</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 body-error">

        </div>

    </section>


</body>

</html>
