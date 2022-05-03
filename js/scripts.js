//button to update order status on change

function changeBtnColor(btn) {
  var element = document.getElementById(btn);
  element.classList.toggle("btn-danger");
}

//show or hide title

function toggle_item(itemid){
  var element= document.getElementById(itemid);
  element.classList.toggle("d-none");
}

function print_no(count){
  var element=document.getElementById("number_of_orders").textContent=count;
  
}
