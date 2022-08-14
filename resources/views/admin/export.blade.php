<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- partial:index.partial.html -->
    <link rel="stylesheet" type="text/css" href="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/styles/jqx.base.css">

    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdatatable.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="https://www.jqwidgets.com/jquery-widgets-demo/jqwidgets/jqxdata.export.js"></script>
    <style>
        .parent{
            display: none;
        }
    </style>
@if(!empty($extras))
<div class="parent">
    <div class="export-btns">
        <input type="button" value="Export to XML" id='xmlExport' />
        <input type="button" value="Export to CSV" id='csvExport' />
        <input type="button" value="Export to JSON" id='jsonExport' />
        <!-- <input type="button" value="Export to Excel" id='excelExport' />
    	<input type="button" value="Export to TSV" id='tsvExport' />
    	<input type="button" value="Export to HTML" id='htmlExport' />
    	<input type="button" value="Export to PDF" id='pdfExport' /> -->
    </div><br>
    <table id="table" border="1">
        <thead>
            <tr>
                @foreach($extras as $extra)
                    <th>{{ $extra->label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($extras as $extra)
                    <td>{{ $extra->value }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@else
@endif

</body>
<script>
    var label = [];
    var value = [];
    <?php foreach($extras as $extra) {
        $array[] = array("label" => $extra->label, "value" => $extra->value);
    } ?>
    
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
            fileName: "field"
        },
        columns: [
            <?php foreach($extras as $extra): ?>
            ,{
                text: '{{ $extra->label }}',
                dataField: '{{ $extra->label }}',
                width: 200
            },
            <?php endforeach; ?>
        ]
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
    var param = getParameters();
      if (typeof param.param !== "undefined") {
            $('#'+param.param).trigger('click');
            setTimeout(function(){
                window.top.close();
            },1000)
      }
});
function getParameters() {
    var searchString = window.location.search.substring(1),
    params = searchString.split("&"),
    hash = {};

    if (searchString == "") return {};
    for (var i = 0; i < params.length; i++) {
    var val = params[i].split("=");
    hash[unescape(val[0])] = unescape(val[1]);
    }

    return hash;
}
</script>
</html>