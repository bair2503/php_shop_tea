function addToCart(id, weight) {
    new Ajax.Request('http://localhost:8888/add_to_basket.php?product_id='+id + '&weight=' + weight, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('basket_count').innerHTML=data.responseText}});
}

