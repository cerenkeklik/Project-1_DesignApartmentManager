function UpdateCellValues() {
    column=1;
    var row= window.prompt("Please enter the row code which value want to change:")
    var value=window.prompt("Please enter updated value:")  
    var a= document.getElementById('tbl').rows[row].cells;
    a[column].innerHTML=value;
        
        
    }