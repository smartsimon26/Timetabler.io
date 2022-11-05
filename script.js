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
        'UnitCode':'UCU 101',
        'Lecturer':'Mr Johnson',
        'Day':'',
        'Timeshift':'',
        'Venue':''
    },
    {
        'UnitCode':'SCO 410',
        'Lecturer':'Dr. Kelly',
        'Day':'',
        'Timeshift':'',
        'Venue':''
    },
    {
        'UnitCode':'SIT 202',
        'Lecturer':'Miss Becky J.',
        'Day':'',
        'Timeshift':'',
        'Venue':''
    },
    {
        'UnitCode':'K24 311',
        'Lecturer':'Rev Teresiah',
        'Day':'',
        'Timeshift':'',
        'Venue':''
    },
    {
        'UnitCode':'SPH 340',
        'Lecturer':'Mrs. Martha',
        'Day':'',
        'Timeshift':'',
        'Venue':''
    }
]

const tabletitles = ['Unit Code', 'Lecturer', 'Day', 'Timeshift', 'Venue'];
const timeshifts = ['Dawn', 'Morning', 'Noon', 'Evening'];
const venues=['1PL1','2PL2','3PL3','1PL4','2PL6'];
const days=['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

let thead=document.getElementById('thead');
thead.innerHTML=`<tr><td>${tabletitles[0]}</td><td>${tabletitles[1]}</td><td>${tabletitles[2]}</td><td>${tabletitles[3]}</td><td>${tabletitles[4]}</td></tr>`


showdata(curriculum)


function showdata(data) {
    var tbody=document.getElementById('tbody');

    for (let i = 0; i < data.length; i++) {
        
    const assignday = Math.floor(Math.random() * days.length);
    data[i].Day=days[assignday];

    const assigntimeshift = Math.floor(Math.random() * timeshifts.length);
    data[i].Timeshift=timeshifts[assigntimeshift];

    const assignvenue = Math.floor(Math.random() * venues.length);
    data[i].Venue=venues[assignvenue];

        const lecture = `<tr>
                            <td>${data[i].UnitCode}
                            <td>${data[i].Lecturer}
                            <td>${data[i].Day}
                            <td>${data[i].Timeshift}
                            <td>${data[i].Venue}
                        </tr>`
        tbody.innerHTML+=lecture
    }
}
function addTimeshift(){
    $("#timeshift_form").submit(function(e) {
        e.preventDefault();
    });
    document.getElementById("timeshift_table").hidden=false;
    var x=$("#sessio_time").val();
   
    //Write to file
    const fs = require("fs");
    var n_sessions=1;
    if (!fs.existsSync('timeshifts.json')) {
        try {
            fs.writeFileSync('timeshifts.json', data)
            console.log('JSON file created.')
          } catch (err) {
            console.error(err)
          }
    }
    
    let timeshifts_json = fs.readFileSync("timeshifts.json","utf-8");
    let timeshifts = JSON.parse(timeshifts_json);
    
    n_sessions+=timeshifts.length;
    const timeshift={session:n_sessions,time:x};
    timeshifts.push(timeshift);
    timeshifts_json = JSON.stringify(timeshifts);
    fs.writeFileSync("timeshifts.json",timeshifts_json,"utf-8");

    // Add the value to table
    $('timeshift_table > tbody:last-child').append('<tr><td>'+n_sessions+'</td><td>'+x+'</td></tr>');
    $("#session_time").val("");
    
    
}