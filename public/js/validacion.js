
function convertDate() {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date()
    return [d.getFullYear(),
    pad(d.getMonth() + 1),
    pad(d.getDate())].join('-')
}

// document.getElementById("fecha").max = convertDate();