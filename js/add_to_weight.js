function change_weight(id) {
    let weight = document.getElementById('product_weight' + id).value
    document.getElementById('p_add'+id).setAttribute('onclick', 'addToCart('+id +',' + weight +')')
}