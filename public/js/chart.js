// var resultUsers = [];
// $users = fetch(
//     routeUsers
// ).then(function (response) {
//     return response.json();
// }).then(function (data) {
//     return data.map(function (user) {
//         resultUsers.push({ name: user.date, y: user.quantity });
//     });
// });
document.addEventListener("DOMContentLoaded", function (event) {
    var labels = [];
    var values = [];
    $users = fetch(
        routeUsers
    ).then(function (response) {
        return response.json();
    }).then(function (data) {
        return data.map(function (user) {
            labels.push(user.date);
            values.push(user.quantity);
        });
    });
    console.log(labels);
    console.log(values);

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Histograma de usuários',
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
