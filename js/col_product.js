function col_Product(id) {
    new Ajax.Request('http://localhost:8888/col_update.php?product_id='+id, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('input_product').innerHTML=data.responseText}});
   document.querySelector('input_product').value='123';

}
function change_price(id) {
  document.getElementById('product_price' + id).value++;

}