function sortNumbers() {
    numbers = document.getElementById('tarea').value;
    numbers = numbers.split(' ');
    
    numbers.sort(function (a, b) {
        return a-b;
    });
    
    result = '<table border="1">';
    for (var i = 0; i < numbers.length; i = i + 5) {
        result += '<tr>'
        for (var j = i; j < i + 5; j++) {
            if (j < numbers.length) {
                result += '<td>' + numbers[j] + '</td>';
            } else {
                result += '<td></td>';
            }
        }
        result += '</tr>';
    }
    result += '</table>'
    
    resdiv = document.getElementById('resultingTable');
    resdiv.innerHTML = result;
}