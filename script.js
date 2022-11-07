
// fetch("Units.json")
// .then(function(response){
//    return response.json();
// })


// .then(function(Units){
//    let placeholder = document.querySelector("#data-output");
//    let out = "";
//    for(let unit of Units){
//       out += `
//          <tr>
//             <td>${unit.code}</td>
//             <td>${unit.lecturer}</td>
//             <td>${unit.day}</td>
//             <td>${unit.timeshift}</td>
//             <td>${unit.venue}</td>
//          </tr>
//       `;
//    }

//    placeholder.innerHTML = out;
// });

var curriculum = [
    {
        'UnitCode': 'UCU 101',
        'Lecturer': 'Mr Johnson',
        'Day': '',
        'Timeshift': '',
        'Venue': ''
    },
    {
        'UnitCode': 'SCO 410',
        'Lecturer': 'Dr. Kelly',
        'Day': '',
        'Timeshift': '',
        'Venue': ''
    },
    {
        'UnitCode': 'SIT 202',
        'Lecturer': 'Miss Becky J.',
        'Day': '',
        'Timeshift': '',
        'Venue': ''
    },
    {
        'UnitCode': 'K24 311',
        'Lecturer': 'Rev Teresiah',
        'Day': '',
        'Timeshift': '',
        'Venue': ''
    },
    {
        'UnitCode': 'SPH 340',
        'Lecturer': 'Mrs. Martha',
        'Day': '',
        'Timeshift': '',
        'Venue': ''
    }
]

const tabletitles = ['Unit Code', 'Lecturer', 'Day', 'Timeshift', 'Venue'];
const timeshifts = ['Dawn', 'Morning', 'Noon', 'Evening'];
const venues = ['1PL1', '2PL2', '3PL3', '1PL4', '2PL6'];
const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

let thead = document.getElementById('thead');
thead.innerHTML = `<tr><td>${tabletitles[0]}</td><td>${tabletitles[1]}</td><td>${tabletitles[2]}</td><td>${tabletitles[3]}</td><td>${tabletitles[4]}</td></tr>`


//showdata(curriculum)


/* function showdata(data) {
    var tbody = document.getElementById('tbody');

    for (let i = 0; i < data.length; i++) {

        const assignday = Math.floor(Math.random() * days.length);
        data[i].Day = days[assignday];

        const assigntimeshift = Math.floor(Math.random() * timeshifts.length);
        data[i].Timeshift = timeshifts[assigntimeshift];

        const assignvenue = Math.floor(Math.random() * venues.length);
        data[i].Venue = venues[assignvenue];

        const lecture = `<tr>
                            <td>${data[i].UnitCode}
                            <td>${data[i].Lecturer}
                            <td>${data[i].Day}
                            <td>${data[i].Timeshift}
                            <td>${data[i].Venue}
                        </tr>`
        tbody.innerHTML += lecture
    }
} */
function loadDefaults(x) {
    console.log("loading defaults");
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
            console.log(response);
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
        console.log("timeshifts");
        $("#timeshift_form").submit(function (e) {
            e.preventDefault();
        });
        document.getElementById("timeshift_table").hidden = false;
        var x = $("#session_time").val();
        if (x === "") {
            return;
        }
        console.log("You entered " + x)
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
                console.log(response);
                if (message == servercodes[0]) {// If no error occured
                    // Add the value to table
                    $('#timeshift_table > tbody:last-child').append('<tr><td>' + n_sessions + '</td><td>' + x + '</td></tr>');
                    $("#session_time").val("");
                }
            }
        };
        xmlhttp.open("GET", "saveSettings.php?timeshift=" + x, true);
        xmlhttp.send();
    } else if (setting == "venues") {
        console.log("venues");
        $("#venues_form").submit(function (e) {
            e.preventDefault();
        });
        document.getElementById("venues_table").hidden = false;
        var x = $("#session_venue").val();
        if (x === "") {
            return;
        }
        console.log("You entered " + x)
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
                console.log(response);
                if (message == servercodes[0]) {// If no error occured
                    // Add the value to table
                    $('#venues_table > tbody:last-child').append('<tr><td>' + n_sessions + '</td><td>' + x + '</td></tr>');
                    $("#session_venue").val("");
                }
            }
        };
        xmlhttp.open("GET", "saveSettings.php?venue=" + x, true);
        xmlhttp.send();
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
        console.log("You entered " + x)
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
                console.log(response);
                if (message == servercodes[0]) {// If no error occured
                    // Add the value to table
                    $('#days_table > tbody:last-child').append('<tr><td>' + n_sessions + '</td><td>' + x + '</td></tr>');
                    $("#session_day").val("");
                }
            }
        };
        xmlhttp.open("GET", "saveSettings.php?day=" + x, true);
        xmlhttp.send();
    }


}