function addIngredient(obj) {
    var div = obj.closest(".row").clone();
    div.find("input").each(function() {
        $(this).val("");
    });
    div.appendTo( ".ingredients" );
    obj.remove();
}

function addStage(obj) {
    var div = obj.closest(".row").clone();
    div.find("input").each(function() {
        $(this).val("");
    });
    div.appendTo( ".stage" );
    obj.remove();
}