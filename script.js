const frame1 = document.querySelector("#frame-1"),
  frame2 = document.querySelector("#frame-2"),
  frame3 = document.querySelector("#frame-3"),
  frame4 = document.querySelector("#frame-4"),
  step1 = document.querySelector("#step-1"),
  step2 = document.querySelector("#step-2"),
  step3 = document.querySelector("#step-3"),
  step4 = document.querySelector("#step-4");
var dateSelect = "";
var timeSelect = "";

function checkTime(day, date) {
  if (day === "Sun" || day === "Sat") {
    document.querySelector("#check-time").innerHTML = "Time Not Availabe.";
  } else {
    var selectDay = day;
    var selectDate = date;
    $.ajax({
      url: "submit.php",
      type: "post",
      data: {
        selectDate: selectDate,
        selectDay: selectDay,
      },
      success: function (data) {
        document.querySelector("#check-time").innerHTML = data;
        document.querySelector("#check-time").addEventListener("click", (e) => {
          var selectTime = document.querySelectorAll(".selectTime");
          for (var i = 0; i < selectTime.length; i++) {
            if (selectTime[i] == e.target) {
              e.target.classList.add("activeTime");
              timeSelect = e.target.textContent;
            } else {
              selectTime[i].classList.remove("activeTime");
            }
          }
        });
      },
    });
  }
}

function checkOTP() {
  var otp = $("#v-otp").val();
  var number = $("#phoneNumber").val();

  $.ajax({
    url: "submit.php",
    type: "post",
    data: {
      otp: otp,
      number: number,
    },
    success: function (status) {
      if (status === "invalid_otp") {
        $("#error-otp").html("Invalid OTP");
      } else if (status === "valid_otp") {
        appointmentDetail();
        $("#otpmodal").modal("hide");
        frame3.style.opacity = "0";
        frame3.style.visibility = "hidden";
        frame4.style.opacity = "1";
        frame4.style.visibility = "visible";
        step3.classList.remove("step-active");
        step4.classList.add("step-active");
      } else {
        // Handle unexpected status
        console.error("Unexpected status: " + status);
      }
    },
    error: function (xhr, status, error) {
      // Handle AJAX errors here
      console.error("AJAX Error: " + error);
    },
  });
}

function appointmentDetail() {
  var hospital_name = $("#hospital-name").val();
  var doctorname = $("#doctor-name").val();
  var date = dateSelect;
  var settime = timeSelect;
  var name = $("#name").val();
  var email = $("#email").val();
  var number = $("#phoneNumber").val();
  document.querySelector("#phoneNumber").readOnly = true;
  var address = $("#address").val();
  $("#h-name").html(hospital_name);
  $("#d-name").html(doctorname);
  $("#c-date").html(date);
  $("#c-time").html(settime);
  $("#c-name").html(name);
  $("#c-email").html(email);
  $("#c-number").html(number);
  $("#c-address").html(address);
}

function varificationPhone() {
  $("#button-next-3").html(
    '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
  );
  var phoneNumber = $("#phoneNumber").val();
  var verificationPhone = "phone";
  $.ajax({
    url: "submit.php",
    type: "post",
    data: {
      phoneNumber: phoneNumber,
      verificationPhone: verificationPhone,
    },
    success: function (status) {
      $("#button-next-3").html("Next");
      if (status === "new_user") {
        $("#input-number").html(phoneNumber);
        $("#otpmodal").modal("show");
      } else if (status === "user_exit") {
        appointmentDetail();
        frame3.style.opacity = "0";
        frame3.style.visibility = "hidden";
        frame4.style.opacity = "1";
        frame4.style.visibility = "visible";
        step3.classList.remove("step-active");
        step4.classList.add("step-active");
      } else {
        console.error(status);
      }
    },
    error: function (xhr, status, error) {
      // Handle AJAX errors here
      console.error("AJAX Error: " + error);
    },
  });
}

function confirmDetail() {
  var hospital_name = $("#hospital-name").val();
  var doctorname = $("#doctor-name").val();
  var date = dateSelect;
  var settime = timeSelect;
  var name = $("#name").val();
  var email = $("#email").val();
  var number = $("#phoneNumber").val();
  var gender = $("#gender").val();
  var reason = $("#reason").val();
  var address = $("#address").val();

  $.ajax({
    url: "submit.php",
    type: "post",
    data: {
      hospitalname: hospital_name,
      doctorname: doctorname,
      date: date,
      settime: settime,
      name: name,
      email: email,
      number: number,
      address: address,
      gender: gender,
      reason: reason,
    },
    success: function (status) {
      if (status === "user_details_added") {
        window.location.href = "confirm.php";
      }
    },
  });
}

function validationPage2() {
  var settime = timeSelect;
  var validation = true;
  if (settime === "") {
    var validation = false;
    document.querySelector("#check-time").style.border = "1px solid red";
    document.querySelector("#check-time").style.boxShadow =
      "0px 0px 8px #db2a2ade";
  } else {
    document.querySelector("#check-time").style.border = "0px solid red";
    document.querySelector("#check-time").style.boxShadow =
      "0px 0px 0px #db2a2ade";
  }
  if (validation) {
    frame2.style.opacity = "0";
    frame2.style.visibility = "hidden";
    frame3.style.opacity = "1";
    frame3.style.visibility = "visible";
    step2.classList.remove("step-active");
    step3.classList.add("step-active");
  }
}

function validationPage3() {
  var name = $("#name").val();
  var email = $("#email").val();
  var number = $("#phoneNumber").val();
  var gender = $("#gender").val();
  var reason = $("#reason").val();
  var address = $("#address").val();
  var validation = true;
  if (name.length < 1) {
    $("#errorname").html("Plese Enter your Name");
    var validation = false;
  } else {
    $("#errorname").html("");
  }
  if (email.length < 1) {
    $("#erroremail").html("Plese Enter your E-Mail");
    var validation = false;
  } else {
    $("#erroremail").html("");
  }
  if (number.length < 1) {
    $("#errornumber").html("Plese Enter your Number");
    var validation = false;
  } else if (number.length < 10) {
    $("#errornumber").html("Plese Enter Valid Number");
    var validation = false;
  } else {
    $("#errornumber").html("");
  }
  if (address.length < 1) {
    $("#erroraddress").html("Plese Enter your Address");
    var validation = false;
  } else {
    $("#erroraddress").html("");
  }
  if (gender === "Select Gender") {
    $("#errorgender").html("Plese Select your Gender");
    var validation = false;
  } else {
    $("#errorgender").html("");
  }
  if (reason.length < 1) {
    $("#errorreason").html("Plese Enter your Reason");
    var validation = false;
  } else {
    $("#errorreason").html("");
  }
  if (validation) {
    varificationPhone();
  }
}
document.querySelector("#button-next-1").addEventListener("click", function () {
  frame1.style.opacity = "0";
  frame1.style.visibility = "hidden";
  frame2.style.opacity = "1";
  frame2.style.visibility = "visible";
  step1.classList.remove("step-active");
  step2.classList.add("step-active");
});
document.querySelector("#button-next-2").addEventListener("click", function () {
  validationPage2();
});
document.querySelector("#button-next-3").addEventListener("click", function () {
  validationPage3();
});
document
  .querySelector("#confirm-button")
  .addEventListener("click", function () {
    confirmDetail();
  });
document.querySelector("#button-back-2").addEventListener("click", function () {
  frame2.style.opacity = "0";
  frame2.style.visibility = "hidden";
  frame1.style.opacity = "1";
  frame1.style.visibility = "visible";
  step2.classList.remove("step-active");
  step1.classList.add("step-active");
});
document.querySelector("#button-back-3").addEventListener("click", function () {
  frame3.style.opacity = "0";
  frame3.style.visibility = "hidden";
  frame2.style.opacity = "1";
  frame2.style.visibility = "visible";
  step3.classList.remove("step-active");
  step2.classList.add("step-active");
});
document.querySelector("#button-back-4").addEventListener("click", function () {
  frame4.style.opacity = "0";
  frame4.style.visibility = "hidden";
  frame3.style.opacity = "1";
  frame3.style.visibility = "visible";
  step4.classList.remove("step-active");
  step3.classList.add("step-active");
});

// calender js

const calendar = document.querySelector(".calendar"),
  date = document.querySelector(".date"),
  daysContainer = document.querySelector(".days"),
  prev = document.querySelector(".prev"),
  next = document.querySelector(".next");

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

//function to add days in days with class day and prev-date next-date on previous month and next month days and active on today
function initCalendar() {
  const firstDay = new Date(year, month, 1);
  const lastDay = new Date(year, month + 1, 0);
  const prevLastDay = new Date(year, month, 0);
  const prevDays = prevLastDay.getDate();
  const lastDate = lastDay.getDate();
  const day = firstDay.getDay();
  const nextDays = 7 - lastDay.getDay() - 1;

  date.innerHTML = months[month] + " " + year;

  let days = "";

  for (let x = day; x > 0; x--) {
    days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDate; i++) {
    if (
      i === new Date().getDate() &&
      year === new Date().getFullYear() &&
      month === new Date().getMonth()
    ) {
      activeDay = i;
      getActiveDay(i);
      days += `<div class="day today active">${i}</div>`;
    } else {
      days += `<div class="day ">${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="day next-date">${j}</div>`;
  }
  daysContainer.innerHTML = days;
  addListner();
}

//function to add month and year on prev and next button
function prevMonth() {
  month--;
  if (month < 0) {
    month = 11;
    year--;
  }
  initCalendar();
}

function nextMonth() {
  month++;
  if (month > 11) {
    month = 0;
    year++;
  }
  initCalendar();
}

prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);

initCalendar();

//function to add active on day
function addListner() {
  const days = document.querySelectorAll(".day");
  days.forEach((day) => {
    day.addEventListener("click", (e) => {
      getActiveDay(e.target.innerHTML);
      //   updateEvents(Number(e.target.innerHTML));
      activeDay = Number(e.target.innerHTML);
      //remove active
      days.forEach((day) => {
        day.classList.remove("active");
      });
      //if clicked prev-date or next-date switch to that month
      if (e.target.classList.contains("prev-date")) {
        prevMonth();
        //add active to clicked day afte month is change
        setTimeout(() => {
          //add active where no prev-date or next-date
          const days = document.querySelectorAll(".day");
          days.forEach((day) => {
            if (
              !day.classList.contains("prev-date") &&
              day.innerHTML === e.target.innerHTML
            ) {
              day.classList.add("active");
            }
          });
        }, 100);
      } else if (e.target.classList.contains("next-date")) {
        nextMonth();
        //add active to clicked day afte month is changed
        setTimeout(() => {
          const days = document.querySelectorAll(".day");
          days.forEach((day) => {
            if (
              !day.classList.contains("next-date") &&
              day.innerHTML === e.target.innerHTML
            ) {
              day.classList.add("active");
            }
          });
        }, 100);
      } else {
        e.target.classList.add("active");
      }
    });
  });
}

function getActiveDay(date) {
  const day = new Date(year, month, date);
  const monthNumber = day.getMonth() + 1;
  const dayName = day.toString().split(" ")[0];
  dateSelect =
    year +
    "-" +
    String(monthNumber).padStart(2, "0") +
    "-" +
    String(date).padStart(2, "0");
  checkTime(dayName, dateSelect);
}

// Available time
// Function to create time intervals based on user input
function TimeIntervals() {
  const startTimeInput = "08:00";
  const gapTimeInput = "15";
  const breakStartTimeInput = "13:00";
  const breakEndTimeInput = "14:00";
  const endTimeInput = "17:00";
  const timeIntervalsDiv = document.getElementById("check-time");
  timeIntervalsDiv.innerHTML = ""; // Clear previous content

  const startTime = new Date(`2000-01-01T${startTimeInput}:00`);
  const gapTime = parseInt(gapTimeInput, 10);
  const breakStartTime = new Date(`2000-01-01T${breakStartTimeInput}:00`);
  const breakEndTime = new Date(`2000-01-01T${breakEndTimeInput}:00`);
  const endTime = new Date(`2000-01-01T${endTimeInput}:00`);

  let currentTime = new Date(startTime);

  while (currentTime < endTime) {
    const time = currentTime.toLocaleTimeString("en-US", {
      hour: "2-digit",
      minute: "2-digit",
    });

    // Check if the current time falls within the break or gap
    if (currentTime >= breakStartTime && currentTime < breakEndTime) {
      // Do not display time within the break
    } else {
      const div = document.createElement("div");
      div.textContent = time;
      div.className = "selectTime";
      timeIntervalsDiv.appendChild(div);
    }

    currentTime.setMinutes(currentTime.getMinutes() + gapTime);
  }
}
