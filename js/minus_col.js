function minus_col(id, weight) {
    new Ajax.Request('http://localhost:8888/minus_col.php?product_id='+id +'&weight='+weight, {parameters:{product_id:id}, onSuccess: function(data) {document.getElementById('input_product').innerHTML=data.responseText}});
    if ((document.getElementById('input_product' + id +'_'+weight).value)>1){
        document.getElementById('input_product'+id +'_'+weight).value--;
    }
    }


