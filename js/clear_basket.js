function clear_basket(id) {
new Ajax.Request('http://localhost:8888/clear_basket.php?product_id='+id, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('basket_count').innerHTML=data.responseText}});
}