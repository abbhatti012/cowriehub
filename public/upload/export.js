$(document).ready(function() {
    $("#table").jqxDataTable({
        altRows: false,
        sortable: false,
        editable: false,
        selectionMode: 'multipleRows',
        exportSettings: {
            columnsHeader: true,
            hiddenColumns: false,
            recordsInView: true,
            fileName: "bonfire"
        },
        columns: [{
            text: 'Upload ID',
            dataField: 'Upload ID',
            width: 'auto'
        }, {
            text: 'Date',
            dataField: 'Date',
            width: 150,
            cellsFormat: 'd'
        }, {
            text: 'Salesman',
            dataField: 'Salesman',
            width: 200
        }, {
            text: 'Client Name',
            dataField: 'Client Name',
            width: 200
        }, {
            text: 'Business Name',
            dataField: 'Business Name',
            width: 200
        }, {
            text: 'Website',
            dataField: 'Website',
            width: 200
        }, {
            text: 'Vertical',
            dataField: 'Vertical',
            width: 200
        }, {
            text: 'Service',
            dataField: 'Service',
            width: 200
        }, {
            text: 'Video Type',
            dataField: 'Video Type',
            width: 200
        }]
    });

    $("#xmlExport").jqxButton();
    $("#jsonExport").jqxButton();
    $("#csvExport").jqxButton();
    // $("#excelExport").jqxButton();
    // $("#tsvExport").jqxButton();
    // $("#htmlExport").jqxButton();
    // $("#pdfExport").jqxButton();

    $("#xmlExport").click(function() {
        $("#table").jqxDataTable('exportData', 'xml');
    });
    $("#csvExport").click(function() {
        $("#table").jqxDataTable('exportData', 'csv');
    });
    $("#jsonExport").click(function() {
        $("#table").jqxDataTable('exportData', 'json');
    });
    /* 
    $("#excelExport").click(function() {
    	$("#table").jqxDataTable('exportData', 'xls');
    });
    $("#tsvExport").click(function() {
    	$("#table").jqxDataTable('exportData', 'tsv');
    });
    $("#htmlExport").click(function() {
    	$("#table").jqxDataTable('exportData', 'html');
    });
    $("#pdfExport").click(function() {
    	$("#table").jqxDataTable('exportData', 'pdf');
    }); 
	
    */

});