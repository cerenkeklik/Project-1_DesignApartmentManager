function UpdateCellValues() {
    var row=window.prompt("Please enter the apartment number which value want to change:")
    var column= window.prompt("Please enter the column code which value want to change:","(1,2)")
    var value=window.prompt("Please enter updated value:")  
    var a= document.getElementById('tbl').rows[row].cells;
    a[column].innerHTML=value;
        
        
    }