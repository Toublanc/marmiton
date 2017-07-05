function addItem(obj) {
    obj.closest(".row").clone().appendTo( ".ingredients" );
    obj.remove();
}