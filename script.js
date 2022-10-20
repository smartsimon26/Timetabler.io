let curriculum = [
    SIT400 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    },
    SIT401 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    },
    SIT402 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    },
    SIT403 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    },
    SIT404 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    },
    SIT405 = {
        lecturer:"Mr Mwai",
        Day: "Mon",
        Timeshift:"noon",
        venue:"GPL2",
    }
];
const timeshifts = ['Dawn', 'Morning', 'Noon', 'Evening'];
const schedule= document.getElementById('tt');

schedule.innerHTML='<table><tr>    <td></td><td>1PL1</td><td>1PL2</td><td>1PL3</td><td>2PL4</td><td>2PL5</td></tr><tr>    <td>' + timeshifts[0] +'</td><td></td><td></td><td></td><td></td><td></td></tr><tr>    <td>' + timeshifts[1] +'</td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>' + timeshifts[2] +'</td><td></td><td></td><td></td><td></td><td></td></tr><tr>    <td>' + timeshifts[3] +'</td><td></td><td></td><td></td><td></td><td></td></tr></table>';
