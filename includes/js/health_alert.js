$(document).ready(function () {
var json_data = []

    $.getJSON("data/alerts.json" , function (alerts) {
        console.log(alerts)
json_data = alerts
for(var row of alerts) {
var table_row=
    '<td>' + row.sick + '</td>' +
    '<td>' + row.priority + '</td>' +
    '<td>' + row.messege + '</td>' +
    '<td>' + row.source + '</td>' +
    '<td>' + row.date + '</td>' +
    '</tr>';
if(row.priority == "Low"){
  table_row = '<tr class="table-success">' + table_row;
}else if (row.priority == "Medium"){
  table_row = '<tr class="table-warning">' + table_row;
}else if (row.priority == "High"){
  table_row = '<tr class="table-danger">' + table_row;
}

    $('tbody').append(table_row);
    }
});

$('#priority').on('change', function (e) {
var value = e.target.value;
var match = '';
var buffer = ""
console.log(value);


for (var row of json_data) {
if (row.priority == value || value == "all" ){
buffer =
'<td scope="row">' + row.sick + '</td>' +
'<td>' + row.priority + '</td>' +
'<td>' + row.messege + '</td>' +
'<td>' + row.source + '</td>' +
'<td>' + row.date + '</td>' +
'</tr>'
if(row.priority == "Low"){
  buffer = '<tr class="table-success">' + buffer;
}else if (row.priority == "Medium"){
  buffer = '<tr class="table-warning">' + buffer;
}else if (row.priority == "High"){
  buffer = '<tr class="table-danger">' + buffer;
}
match += buffer;
}
}
$('tbody').html(match);
})

});


