
// $("tbody tr #ganancia #fecha").each(function (index) {


//     let datos = $(".content-alignment").parent("tr").find("td").each(function () {

//     })

//     const miObjeto = {}, elObjeto = [];
//     miObjeto.id = index;
//     miObjeto.porcentaje = ganancia.slice(-4);
//     miObjeto.fecha = $(this).fecha;
//     elObjeto.push(miObjeto);
//     console.log(miObjeto);
//     //console.log( index + ": " + profit.slice(-4) );

// });

// $("#tblInteres tbody tr").each(function(index){
//     let ganancias = $("td").text();
//     console.log(index + ": " + ganancia);
//     //console.log( index + ": " + $(this).text());
// });

// var ctx = document.getElementById("profitChart").getContext('2d');
// var myChart = new Chart(ctx, {
//     type: "bar",
//     data: http://localhost:8080/ApiChart{
//         labels: ['febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
//         datasets: [{
//             label: 'Profit',
//             data: [3, 7, 6, 5.49, 2, 1, 2],
//             backgroundColor: [
//                 'rgb(66, 134, 244,0.5)',
//                 'rgb(172, 247, 132,0.5 )',
//                 'rgb(244, 247,9,0.5)',
//                 'rgb(248, 28, 240,0.5)',
//                 'rgb(248, 128, 240,0.5)',
//                 'rgb(248, 242, 240,0.5)',
//                 'rgb(248, 212, 240,0.5)',
//                 'rgb(248, 233, 240,0.5)',
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         reponsive: true,
//         legend: {
//             display: false
//         },
//         scales: {
//             yAxes: [{
//                 stacked: true,
//                 ticks: {
//                     min: 0,
//                     max: 20,
//                     beginAtZero: true,
//                     callback: function (value) { return value + "%" }
//                 }
//             }]
//         },
//         plugins: {
//             labels: {
//                 render: 'percentage',
//                 showActualPercentages: true
//             }
//         }
//     }
// });


$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/ApiChart",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            var ganancia = [];
            var Concepto = [];
            var fecha =[];
            var color = ['rgba(66, 134, 244,0.3)', 'rgba(172, 247, 132, 0.3)', 'rgba(244, 247,9, 0.3)','rgba(248, 128, 240,0.5)','rgba(248, 242, 240,0.3)','rgba(248, 212, 240,0.3)', 'rgba(248, 233, 240,0.3)', 'rgba(54, 162, 235, 0.3)', 'rgba(255, 206, 86, 0.3)', 'rgba(75, 192, 192, 0.3)', 'rgba(153, 102, 255, 0.3)', 'rgba(255, 159, 64, 0.3)'];
            var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
            console.log(data);
 
            for (var i in data) {
                fecha.push(data[i].fecha);
                Concepto.push(data[i].Concepto);
                ganancia.push(data[i].ganancia);
            }
            
            var chartdata = {
                
                labels: fecha,
                datasets: [{
                    fill: false,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: ganancia
                }]
            };
 
            var mostrar = $("#myChart");
 
            var myChart = new Chart(mostrar, {
                type: 'bar',
                data: chartdata,
                options: {
                    plugins: {
                        title: {
                          display: true,
                          text: 'Chart Title',
                        }
                      },
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});