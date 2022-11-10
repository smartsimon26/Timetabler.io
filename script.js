function saveLecture() {
  var unit_code = $("#unit-code").val();
  var lecturer = $("#lecturer").val();
  if (unit_code == "" || lecturer == "") {
    console.log("unit_code:" + unit_code + "\nlecturer:" + lecturer);
    return;
  }
  document.getElementById("lectures_table").hidden = false;
  $("#lectures_form").submit(function (e) {
    e.preventDefault();
  });

  var timeshifts = $("#timeshift-constraint").find("input:checkbox:checked");
  //console.log("Timeshifts:\n")
  var arrTimeshifts = "";
  for (let i = 0; i < timeshifts.length; i++) {
    arrTimeshifts += timeshifts[i].id;
    if (i < timeshifts.length - 1) {
      arrTimeshifts += ",";
    }
  }
  ////console.log(arrTimeshifts);
  var venues = $("#venue-constraint").find("input:checkbox:checked");
  //console.log("Venues:\n")
  var arrVenues = "";
  for (let i = 0; i < venues.length; i++) {
    arrVenues += venues[i].id;
    if (i < venues.length - 1) {
      arrVenues += ",";
    }
  } ////console.log(arrVenues);
  var days = $("#day-constraint").find("input:checkbox:checked");
  //console.log("Days:\n")
  var arrDays = "";
  for (let i = 0; i < days.length; i++) {
    arrDays += days[i].id;
    if (i < days.length - 1) {
      arrDays += ",";
    }
  } ////console.log(arrDays);
  $("#lectures_form").trigger("reset");
  var n_lectures = $("#lectures_table tbody tr").length + 1;
  $("#lectures_table > tbody:last-child").append(
    "<tr><td>" +
      n_lectures +
      "</td><td>" +
      unit_code +
      "</td><td>" +
      lecturer +
      "</td><td>" +
      arrTimeshifts +
      "," +
      arrVenues +
      "," +
      arrDays +
      "</td><</tr>"
  );

  //
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var response = xmlhttp.responseText;
      // code when server responds
      //console.log(response);
    }
  };
  xmlhttp.open(
    "GET",
    "saveSettings.php?unit_code=" +
      unit_code +
      "&lecturer=" +
      lecturer +
      "&timeshifts=" +
      arrTimeshifts +
      "&venues=" +
      arrVenues +
      "&days=" +
      arrDays,
    true
  );
  xmlhttp.send();
}
function loadDefaults(x) {
  //console.log("loading defaults");
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var response = xmlhttp.responseText;
      // code when server responds
      //console.log(response);
      if (x == "venue") $("#venue-constraint").html(response);
      else if (x == "day") $("#day-constraint").html(response);
      else if (x == "timeshift") $("#timeshift-constraint").html(response);
    }
  };
  xmlhttp.open("GET", "loadDefaults.php?value=" + x, true);
  xmlhttp.send();
}
function addSetting(setting) {
  if (setting == "timeshifts") {
    //console.log("timeshifts");
    $("#timeshift_form").submit(function (e) {
      e.preventDefault();
    });
    document.getElementById("timeshift_table").hidden = false;
    var x = $("#session_time").val();
    if (x === "") {
      return;
    }
    //console.log("You entered " + x)
    // Save to database
    var n_sessions = $("#timeshift_table tbody tr").length + 1;
    // Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var message = "";
    const servercodes = ["SUCCESS", "FAILED:"];
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var response = xmlhttp.responseText;
        // code when server responds
        message = response.substring(0, 7);
        //console.log(response);
        if (message == servercodes[0]) {
          // If no error occured
          // Add the value to table
          $("#timeshift_table > tbody:last-child").append(
            "<tr><td>" + n_sessions + "</td><td>" + x + "</td></tr>"
          );
          $("#session_time").val("");
        }
      }
    };
    xmlhttp.open("GET", "saveSettings.php?timeshift=" + x, true);
    xmlhttp.send();
    // end of timeshift
  } else if (setting == "venues") {
    console.log("venues");
    $("#venues_form").submit(function (e) {
      e.preventDefault();
    });
    document.getElementById("venues_table").hidden = false;
    var venue_name = $("#venue_name").val();
    var venue_category = $("#venue_category").val();
    var venue_capacity = $("#venue_capacity").val();
    if (venue_name || venue_category || venue_capacity === "") {
      return;
    }
    console.log(
      "You entered " + venue_name + " and ",
      venue_category + " and ",
      venue_capacity
    );
    // Save to database
    var n_sessions = $("#venues_table tbody tr").length + 1;
    // Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var message = "";
    const servercodes = ["SUCCESS", "FAILED:"];
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var response = xmlhttp.responseText;
        // code when server responds
        message = response.substring(0, 7);
        //console.log(response);
        if (message == servercodes[0]) {
          // If no error occured
          // Add the value to table
          $("#venues_table > tbody:last-child").append(
            "<tr><td>" +
              n_sessions +
              "</td><td>" +
              venue_name +
              "</td><td>" +
              venue_category +
              "</td><td>" +
              venue_capacity +
              "</td></tr>"
          );
          $("#session_venue").val("");
        }
      }
    };
    xmlhttp.open(
      "GET",
      "saveSettings.php?venue_name=" +
        venue_name +
        "&venue_category=" +
        venue_category +
        "&venue_capacity=" +
        venue_capacity,
      true
    );
    xmlhttp.send();
    //end of venue
  } else if (setting == "days") {
    console.log("days");
    $("#days_form").submit(function (e) {
      e.preventDefault();
    });
    document.getElementById("days_table").hidden = false;
    var x = $("#session_day").val();
    if (x === "") {
      return;
    }
    console.log("You entered " + x);
    // Save to database
    var n_sessions = $("#days_table tbody tr").length + 1;
    // Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var message = "";
    const servercodes = ["SUCCESS", "FAILED:"];
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var response = xmlhttp.responseText;
        // code when server responds
        message = response.substring(0, 7);
        //console.log(response);
        if (message == servercodes[0]) {
          // If no error occured
          // Add the value to table
          $("#days_table > tbody:last-child").append(
            "<tr><td>" + n_sessions + "</td><td>" + x + "</td></tr>"
          );
          $("#session_day").val("");
        }
      }
    };
    xmlhttp.open("GET", "saveSettings.php?day=" + x, true);
    xmlhttp.send();
  }
}
