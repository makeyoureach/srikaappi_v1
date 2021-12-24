<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    </head>
    <body>
        <button onclick=autoPrintFunction()>Print</button>
    </body>
    <script>
        function autoPrintFunction(){
            var doc =new jsPDF('p', 'mm', [85, 210]);
            var name = "Doe, John"
            doc.setFontType("normal");
            doc.setFontSize(12);
            doc.text(20,20,'Name: '+ name);
            doc.autoPrint();
            window.open(doc.output('bloburl'), '_blank');
        }
    </script>
</html>