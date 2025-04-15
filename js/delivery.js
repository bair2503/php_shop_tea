document.addEventListener('DOMContentLoaded', () => {
    const radios = document.querySelectorAll('input[name="shipping_radio"]');
    const deliveryTextEl = document.getElementById('selected_delivery');
    const hiddenInput = document.getElementById('delivery_option');

    const updateDeliveryText = () => {
        const checkedRadio = document.querySelector('input[name="shipping_radio"]:checked');
        if (checkedRadio) {
            const text = checkedRadio.closest('label').querySelector('.radio_text').innerText;
            deliveryTextEl.innerText = text;
            hiddenInput.value = text;
        }
    };

    radios.forEach(radio => {
        radio.addEventListener('change', updateDeliveryText);
    });

    // Установить начальное значение при загрузке
    updateDeliveryText();
});