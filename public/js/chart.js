var resultUsers = [];
$users = fetch(
    routeUsers
).then(function (response) {
    return response.json();
}).then(function (data) {
    return data.map(function (user) {
        resultUsers.push({ name: user.date, y: user.quantity });
    });
});

var chart = JSC.chart('chartDiv', {
    debug: true,
    type: 'column',
    title_label_text:
        'Histograma de novos usuários por dia',
    legend_visible: false,
    yAxis_defaultTick_label_text: '%value',
    xAxis: {
        defaultTick: {
            placement: 'inside',
            label: {
                color: 'white',
                style: {
                    fontWeight: 'bold',
                    fontSize: 16
                }
            }
        }
    },
    series: [
        {
            defaultPoint: {
                tooltip:
                    '<b>%yValue</b> se cadastraram<br> no dia <b>%name</b>',
                label_text: '%value'
            },
            name: 'Users with access',
            points: resultUsers
        }
    ]
});