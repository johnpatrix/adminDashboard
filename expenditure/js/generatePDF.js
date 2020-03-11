function genPDF(){
	var doc = new jsPDF();
	//doc.fromHTML($('#table_report')[0],20,20,{'width':500});
	 doc.autoTable({html: '#table_report'});
	doc.save("trial1.pdf");
}