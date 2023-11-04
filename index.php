<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?13">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
        integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- <script src="script.js?version=01" defer></script> -->
</head>

<body>
    <div class="container">
        <div class="form_box">
            <div class="header">
                <div class="company_name">Apace Med+</div>
                <div class="steps">
                    <span class="step-1 step-active" id="step-1">1</span>
                    <span class="step-2" id="step-2">2</span>
                    <span class="step-3" id="step-3">3</span>
                    <span class="step-4" id="step-4">4</span>
                </div>
            </div>
            <div class="box" id="box">
                <div id="frame-1" class="middle">
                    <div class="frame-container">
                        <div class="frame-tittle">
                            <h2>Book And Appointment</h2>
                        </div>
                        <div class="frame-content">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="select-service">Hospital/Clinic</label>
                                        <select id="hospital-name" class="form-select">
                                            <option>Dr. Gaurav Aggarwal's Clinic</option>
                                            <option>Lakhera hair Clinic</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="select-provider">Select Doctor/Consultan</label>
                                        <select id="doctor-name" class="form-select">
                                            <option>Dr. Gaurav Aggarwal</option>
                                            <option>Dr Lakhera </option>
                                        </select>
                                    </div>

                                    <!--<div id="service-description"></div>-->

                                    <div class="command-buttons">
                                        <span>&nbsp;</span>
                                        <button type="button" id="button-next-1" class="btn button-next btn-dark"
                                            data-step_index="1">
                                            Next <i class="fas fa-chevron-right ml-2"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id='frame-2' class="middle">
                    <div class="frame-container">
                        <div class="frame-tittle">
                            <h2>Appointment Date & Time</h2>
                        </div>
                        <div class="frame-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="select-date">
                                        <div class="calendar">
                                            <div class="calender-box">
                                                <div class="month">
                                                    <i class="fas fa-angle-left prev"></i>
                                                    <div class="date">december 2023</div>
                                                    <i class="fas fa-angle-right next"></i>
                                                </div>
                                                <div class="weekdays">
                                                    <div>Sun</div>
                                                    <div>Mon</div>
                                                    <div>Tue</div>
                                                    <div>Wed</div>
                                                    <div>Thu</div>
                                                    <div>Fri</div>
                                                    <div>Sat</div>
                                                </div>
                                            </div>
                                            <div class="days"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="check-time" class="col-md-5">
                                </div>
                            </div>
                            <div class="command-buttons ">
                                <button type="button" id="button-back-2" class="btn button-back btn-outline-secondary"
                                    data-step_index="2">
                                    <i class="fas fa-chevron-left mr-2"></i>
                                    Back </button>
                                <button type="button" id="button-next-2" class="btn button-next btn-dark"
                                    data-step_index="2">
                                    Next <i class="fas fa-chevron-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="frame-3" class="middle">
                    <div class="frame-container">
                        <div class="frame-tittle">
                            <h2>Patient Information</h2>
                        </div>
                        <div id="frame" class="frame-content">
                            <div class="row mt-1">
                                <div class="col">
                                    <label class="form-label">Full Name<span class="text-danger">*</span></label>
                                    <input id="name" name="fname" type="text" class="form-control">
                                    <div class="text-danger" id="errorname"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label">E-Mail<span class="text-danger">*</span></label>
                                    <input id="email" name="email" type="email" class="form-control">
                                    <div class="text-danger" id="erroremail"></div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label class="form-label">Number<span class="text-danger">*</span></label>
                                    <input id="phoneNumber" name="number" type="number" class="form-control">
                                    <div class="text-danger" id="errornumber"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                                    <select class="form-select" id="gender">
                                        <option selected>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <div class="text-danger" id="errorgender"></div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label class="form-label">Reason<span class="text-danger">*</span></label>
                                    <input name="reason" type="text" class="form-control" id="reason">
                                    <div class="text-danger" id="errorreason"></div>
                                </div>
                                <div class="col">
                                    <label class="form-label">Address<span class="text-danger">*</span></label>
                                    <input id="address" name="address" type="text" class="form-control">
                                    <div class="text-danger" id="erroraddress"></div>
                                </div>
                            </div>
                            <div class="col-12 command-buttons">
                                <button id="button-back-3" class="btn button-back btn-outline-secondary" type="button">
                                    <i class="fas fa-chevron-left mr-2"></i> Back</button>
                                <button id="button-next-3" class="btn button-next btn-dark" type="button">
                                    Next <i class="fas fa-chevron-right ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="frame-4" class="middle">
                    <div class="frame-container">
                        <div class="frame-tittle">
                            <h2>Appointment Confirmation</h2>
                        </div>
                        <div class="frame-content">
                            <div id="confirmdetails">
                                <div class="left">
                                    <h4>Appointment Details</h4>
                                    <div class="mt-1">Hospital Name : <span id="h-name"></span></div>
                                    <div class="mt-1">Docter Name : <span id="d-name"></span></div>
                                    <div class="mt-1">Date : <span id="c-date"></span></div>
                                    <div class="mt-1">Time : <span id="c-time"></span></div>
                                </div>
                                <div class="right">
                                    <h4>Customer Details</h4>
                                    <div class="mt-1">Name : <span id="c-name"></span></div>
                                    <div class="mt-1">Number : <span id="c-number"></span></div>
                                    <div class="mt-1">E-Mail : <span id="c-email"></span></div>
                                    <div class="mt-1">Address : <span id="c-address"></span></div>
                                </div>
                            </div>
                            <div class="command-buttons">
                                <button type="button" id="button-back-4" class="btn button-back btn-outline-secondary">
                                    <i class="fas fa-chevron-left mr-2"></i>
                                    Back </button>
                                <!-- <form id="book-appointment-form" style="display:inline-block" method="post"> -->
                                <button id="confirm-button" name="confirm-button" class="btn btn-success">
                                    <i class="fas fa-check-square mr-2"></i>
                                    Confirm </button>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="margin:0px">
            <div id="frame-footer" class="footer">
                <span class="footer-powered-by">
                    Powered by <a href="https://apacetechnology.com">Apace!</a>
                    <!--<a href="https://easyappointments.org" target="_blank">Easy!Appointments</a>-->
                </span>
                <span class="footer-options">
                    <span id="select-language" class="select-language badge badge-secondary">
                        <i class="fas fa-language mr-2"></i>
                        English</span>
                    <a class="backend-link badge badge-primary" href="https://easy.doctly.in/index.php/backend">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login </a>
                </span>
            </div>
        </div>
    </div>

    <!-- otp modal  -->

    <div class="modal fade" id="otpmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Varification Phone Number</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="fs-5 text-success">It Seems You are new here !</div>
                    <div class="text-dark mb-4">We Send Varification OTP to your Phone No. <b id="input-number"></b>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter Varification OTP</label>
                        <input type="text" class="form-control" id="v-otp" aria-describedby="emailHelp">
                        <div id="error-otp" class="text-danger"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onclick="checkOTP()" type="button" class="btn btn-primary">Submit OTP</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="script.js?17"></script>
</body>

</html>