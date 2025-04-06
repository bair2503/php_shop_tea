function plus_col(id, weight,) {
    new Ajax.Request('http://localhost:8888/plus_col.php?product_id='+id +'&weight='+weight, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('input_product').innerHTML=data.responseText}});
    document.getElementById('input_product'+id +'_'+weight).value++;

}
