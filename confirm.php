<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?32">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div id='confirm-page' class="confirm-page">
        <div class="container-confirm">
            <div class="frame-container">
                <h2 class="frame-title"><img src="./images/success.png" alt="#"></h2>
                <h2 class="d-flex justify-content-center">Your Appointemnt Has Been Successful Submited</h2>
                <span class="d-flex justify-content-center mb-3">An email with the appointment details has been sent
                    to you.</span>
                <span class="d-flex justify-content-center fw-bold">Please check your spam folder if the email does
                    not arrive within a few minutes.</span>
            </div>
            <div class="frame-5-command-buttons d-flex justify-content-center my-4">
                <a href="index.php" id="button-next-1" class="btn mx-1 btn-success px-5">
                    <i class="fa-solid fa-calendar-days"></i>&nbsp;
                    Go To Booking Page </a>
                <a href="https://calendar.google.com/calendar/" id="button-next-2" class="btn mx-1 btn-primary px-5"><i class="fa-solid fa-plus"></i>&nbsp;
                    Add To Google Calender</a>
            </div>
            <div class="d-flex justify-content-center fs-6 pt-1">Powered by&nbsp;<a href="">Apace!</a></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="script.js?1"></script>
</body>

</html>