$(document).ready(function () {
var json_data = []

    $.getJSON("data/alerts.json" , function (alerts) {
        console.log(alerts)
json_data = alerts
for(var row of alerts) {
var table_row= $(
    '<tr>' +
    '<td>' + row.sick + '</td>' +
    '<td class="row.priority">' + row.priority + '</td>' +
    '<td>' + row.messege + '</td>' +
    '<td>' + row.source + '</td>' +
    '<td>' + row.date + '</td>' +
    '</tr>'
    )
    $('tbody').append(table_row);
    }
});

$('#priority').on('change', function (e) {
var value = e.target.value;
var match = '';
console.log(value);


for (var row of json_data) {
if (row.priority == value || value == "all" )
match +=
'<tr>' +
'<td scope="row">' + row.sick + '</td>' +
'<td>' + row.priority + '</td>' +
'<td>' + row.messege + '</td>' +
'<td>' + row.source + '</td>' +
'<td>' + row.date + '</td>' +
'</tr>'
}
$('tbody').html(match);
})

});
