function sortNumbers() {
    numbers = document.getElementById('tarea').value;
    numbers = numbers.split(' ');

    ok = true;    
    numbers.some(function (el){
        if (isNaN(el)) {
            alert('Please provide only numbers!');
            ok = false;
            return true;
        }
    });
    
    if (ok === false) {
        return;
    }
    
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