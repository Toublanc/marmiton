var $collectionHolder;

// setup an "add a tag" link
var $addIngredientLink = $('#add_ingredient_link');
var $addStageLink = $('#add_stage_link');
var $divSearch = $('#search-receipts');

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.ingredients');
    $collectionHolder2 = $('ul.stage');

    // add the "add a tag" anchor and li to the tags ul
   // $collectionHolder.append($addIngredientLink);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    $collectionHolder2.data('index2', $collectionHolder2.find(':input').length);

    $addIngredientLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addIngredientForm($collectionHolder, $addIngredientLink);
    });

    $addStageLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addStageForm($collectionHolder2, $addStageLink);
    });

    $('#search-receipts').autocomplete({
        source : function(requete, reponse) {
            $.ajax({
                url : '/fr/search_receipt',
                dataType : 'json',
                data : {
                    name : $('#search-receipts').val(),
                    maxRows : 15
                },
                success : function(donnee){
                    reponse($.map(donnee.receipts, function(objet){
                        return objet.name + ', ' + objet.id;
                    }));
                }
            });
        },
        minLength: 3,
        select : function(event, ui){
            alert('ok');
        }
    });
});

function addIngredientForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}

function addStageForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index2 = $collectionHolder.data('index2');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index2);

    // increase the index with one for the next item
    $collectionHolder.data('index2', index2 + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}