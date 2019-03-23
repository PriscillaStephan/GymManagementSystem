function tableSearch() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("txtSearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function totalAmount(){

    var paid = document.getElementById("txtPaid").value;
    var total = document.getElementById("txtTotalAmount").value;
    var remain = document.getElementById("txtRemain").value;

    remain = total - paid;

    if(paid != null){
      document.getElementById("txtRemain").value = remain;
    }else{
      document.getElementById("txtRemain").value = "";
    }
}


