function UpdateCellValues() {
row=1;
var column= window.prompt("Please enter the column code which value want to change:")
var value=window.prompt("Please enter updated value:")  
var a= document.getElementById('tbl').rows[row].cells;
a[column].innerHTML=value;
    
    
}