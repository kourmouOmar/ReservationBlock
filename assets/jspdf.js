var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 10, 10, {

        orientation: 'p',
 unit: 'mm',
 format: 'a4',
        /*'width': 5000,
        'orientation': 'L',*/
        'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});