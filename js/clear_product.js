function clear_product(id) {
    new Ajax.Request('http://localhost:8888/clear_product.php?product_id='+id, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('basket_count').innerHTML=data.responseText}});
     document.getElementById('product' + id).remove();
}







