// var ctxL = document.getElementById("lineChart").getContext("2d");
// var myLineChart = new Chart(ctxL, {
//   type: "line",
//   data: {
//     labels: ["January", "February", "March", "April", "May", "June", "July"],
//     datasets: [
//       {
//         label: "My First dataset",
//         data: [65, 59, 80, 81, 56, 55, 40],
//         backgroundColor: ["rgba(105, 0, 132, .2)"],
//         borderColor: ["rgba(200, 99, 132, .7)"],
//         borderWidth: 2,
//       },
//       {
//         label: "My Second dataset",
//         data: [28, 48, 40, 19, 86, 27, 90],
//         backgroundColor: ["rgba(0, 137, 132, .2)"],
//         borderColor: ["rgba(0, 10, 130, .7)"],
//         borderWidth: 2,
//       },
//     ],
//   },
//   options: {
//     responsive: true,
//   },
// });
const dataLine = {
  type: "line",
  data: {
    labels: [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday ",
    ],
    datasets: [
      {
        label: "Traffic",
        data: [2112, 2343, 2545, 3423, 2365, 1985, 987],
      },
    ],
  },
};

new mdb.Chart(document.getElementById("line-chart"), dataLine);
document.write("this is the text");
