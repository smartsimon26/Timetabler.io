var all_days = [];
var all_timeshifts = [];
var all_venues = [];
function saveLecture() {
  console.log("----");
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
  //console.log(arrTimeshifts + ":" + arrTimeshifts.length);
  var venues = $("#venue-constraint").find("input:checkbox:checked");
  //console.log("Venues:\n")
  var arrVenues = "";
  for (let i = 0; i < venues.length; i++) {
    arrVenues += venues[i].id;
    if (i < venues.length - 1) {
      arrVenues += ",";
    }
  } //console.log(arrVenues + ":" + arrVenues.length);
  var days = $("#day-constraint").find("input:checkbox:checked");
  //console.log("Days:\n")
  var arrDays = "";
  for (let i = 0; i < days.length; i++) {
    arrDays += days[i].id;
    if (i < days.length - 1) {
      arrDays += ",";
    }
  } //console.log(arrDays + ":" + arrDays.length);
  //
  //

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
      var st = "";
      var items = response.split("|"); items.pop();
      items.forEach(element => {
        st += "<div class=\"form-group\"><label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"" +
          element + "\">" + element + "</label></div>";
        //console.log(element);
      });
      if (x == "venue") { $("#venue-constraint").html(st); all_venues = JSON.parse(JSON.stringify(items)); }
      else if (x == "day") { $("#day-constraint").html(st); all_days = JSON.parse(JSON.stringify(items)); }
      else if (x == "timeshift") { $("#timeshift-constraint").html(st); all_timeshifts = JSON.parse(JSON.stringify(items)); }
      else if (x == "lec") {
        if (response.startsWith("FAILED:")) {//if error occured
          //$('#error-msg').html(response.slice(7));
          return;
        }
        $("#lectures_table > tbody:last-child").append(response);

      }
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
    if (venue_name == "" || venue_category == "" || venue_capacity === "") {
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
function jsonToCsv(objArray) {
  var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
  var str = '';
  //body
  for (var i = 0; i < array.length; i++) {
    var line = '';
    for (var index in array[i]) {
      if (line != '') line += ','

      line += array[i][index];
    }

    str += line + '\r\n';
  }
  console.log(str);
  return str;
}
function downloadCSVFromJson(filename, arrayOfJson) {
  // convert JSON to CSV
  const replacer = (key, value) => value === null ? '' : value // specify how you want to handle null values here
  const header = Object.keys(arrayOfJson[0])
  let csv = arrayOfJson.map(row => header.map(fieldName =>
    JSON.stringify(row[fieldName], replacer)).join(','))
  csv.unshift(header.join(','))
  csv = csv.join('\r\n')

  // Create link and download
  var link = document.createElement('a');
  link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv));
  link.setAttribute('download', filename);
  link.style.visibility = 'hidden';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

function generateTimetable() {
  $("#final_table tbody > tr").remove();
  var lec_obj = {
    id: 0, unit_code: "", lecturer: "", timeshift: "", venue: "", day: "",
    constraint: {
      const_time: [], const_venue: [], const_day: []
    }
  };
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
      if (response.startsWith("FAILED:")) {//if error occured
        $('#error-msg').html(response);
        console.log(response);
        return;
      }
      response = response.slice(0, -1);
      var rows = response.split("#");
      var final_lectures = new Array();
      for (let i = 0; i < rows.length; i++) {
        var ss = rows[i].split("^");
        var consts = ss[ss.length - 1].split("|");
        let obj = JSON.parse(JSON.stringify(lec_obj));
        obj.id = ss[0]; obj.unit_code = ss[1]; obj.lecturer = ss[2];
        if (!(typeof consts[0] === 'undefined' || consts[0] == '')) {
          obj.constraint.const_time = consts[0].split(",");
        }
        if (!(typeof consts[1] === 'undefined' || consts[1] == '')) {
          obj.constraint.const_venue = consts[1].split(",");
        }
        if (!(typeof consts[2] === 'undefined' || consts[2] == '')) {
          obj.constraint.const_day = consts[2].split(",");
        }
        final_lectures.push(obj);
      }

      //loop through the JSON
      final_lectures.forEach(element => {
        populateLectures(element);
      });

      final_lectures.forEach(element => {
        var row = "<tr><td>" + (final_lectures.indexOf(element) + 1) + "</td><td>" + element.unit_code + "</td><td>" +
          element.lecturer + "</td><td>" + element.venue + "</td><td>" + element.timeshift + "</td><td>" + element.day +
          "</td></tr>";
        $("#final_table > tbody:last-child").append(row);
      });

      while (collisionCheck(final_lectures));//loop until all collisions are removed
      //display the table again
      $("#final_table tbody tr").remove();
      final_lectures.forEach(element => {
        var row = "<tr><td>" + (final_lectures.indexOf(element) + 1) + "</td><td>" + element.unit_code + "</td><td>" +
          element.lecturer + "</td><td>" + element.venue + "</td><td>" + element.timeshift + "</td><td>" + element.day +
          "</td></tr>";
        $("#final_table > tbody:last-child").append(row);
      });


      //option for downloading JSON
      document.getElementById('download').hidden = false;

      var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(final_lectures));
      var dlAnchorElem = document.getElementById('save_as_json');
      dlAnchorElem.setAttribute("href", dataStr);
      dlAnchorElem.setAttribute("download", "lectures-timetable.json");

      $('#save_as_pdf').click(function name() {
        var HTML_Width = $("#final_lectures").width();
        var HTML_Height = $("#final_lectures").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($("#final_lectures")[0]).then(function (canvas) {
          var imgData = canvas.toDataURL("image/jpeg", 1.0);
          var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
          pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
          for (var i = 1; i <= totalPDFPages; i++) {
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
          }
          pdf.save("Timetable " + new Date().getHours() + "-" + new Date().getMinutes() + "-" + new Date().getSeconds() + ".pdf");
        });
      });
      $('#save_as_csv').click(function name() {
        var csv_data = [];
        var rows = document.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
          var cols = rows[i].querySelectorAll('td,th');
          var csvrow = [];
          for (var j = 0; j < cols.length; j++) {
            csvrow.push(cols[j].innerHTML);
          }
          csv_data.push(csvrow.join(","));
        }
        csv_data = csv_data.join('\n');
        downloadCSVFile(csv_data);
        function downloadCSVFile(csv_data) {
          CSVFile = new Blob([csv_data], { type: "text/csv" });
          var temp_link = document.createElement('a');
          temp_link.download = "Timetable " + new Date().getHours() + "-" + new Date().getMinutes() + "-" + new Date().getSeconds() + ".csv";
          var url = window.URL.createObjectURL(CSVFile);
          temp_link.href = url;
          temp_link.style.display = "none";
          document.body.appendChild(temp_link);
          temp_link.click();
          document.body.removeChild(temp_link);
        }
      });

      $('#save_to_database').click(function name() {
        //console.log("saving to database");
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
            console.log(response);
          }
        };
        xmlhttp.open("GET", "saveSettings.php?save_to_database=" + JSON.stringify(final_lectures), true);
        xmlhttp.send();
      });

      //downloadCSVFromJson('myCustomName.csv', final_lectures);

      console.log(final_lectures);
    }
  };
  xmlhttp.open("GET", "loadDefaults.php?value=timetable", true);
  xmlhttp.send();

}
function populateLectures(element) {
  //for each object generate its position in the timetable
  var _days = JSON.parse(JSON.stringify(all_days));
  var _venues = JSON.parse(JSON.stringify(all_venues));
  var _timeshifts = JSON.parse(JSON.stringify(all_timeshifts));
  element.constraint.const_day.forEach(e => {
    _days.splice(_days.indexOf(e), 1);
  });
  element.constraint.const_venue.forEach(e => {
    _venues.splice(_venues.indexOf(e), 1);
  });
  element.constraint.const_time.forEach(e => {
    _timeshifts.splice(_timeshifts.indexOf(e), 1);
  });

  element.day = _days[Math.floor(Math.random() * _days.length)];
  element.venue = _venues[Math.floor(Math.random() * _venues.length)];
  element.timeshift = _timeshifts[Math.floor(Math.random() * _timeshifts.length)];
}
function collisionCheck(lectures) {
  var collision_detected = false;
  for (let i = 0; i < lectures.length; i++) {
    const element = lectures[i];
    for (let j = i + 1; j < lectures.length; j++) {
      if (element.day == lectures[j].day && element.venue == lectures[j].venue && element.timeshift == lectures[j].timeshift) {
        collision_detected = true;
        console.log("Removing collision between:" + element.unit_code + " & " + lectures[j].unit_code);
        populateLectures(element);
      }
    }
  }
  if (!collision_detected) {
    console.log("Collisions removed");
  }
  return collision_detected;
}
