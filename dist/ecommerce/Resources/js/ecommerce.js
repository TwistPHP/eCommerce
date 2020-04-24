// Product category
var productCategories = [];
var productTags = [];

var TwistAJAX = new twistajax( '/manager/ajax/ecommerce' );

$(document).ready(function () {
    
    //Capture the enter press and add the selected category
    $('input[name="product-category"]').on('keydown',function(e) {
        if(e.which == 13){
            e.preventDefault();
            addCategory($(this).val());
            clearCategorySearch();
        }
    });

    //Watch the key presses and show a surgested list of pre-existing categories
    $('input[name="product-category"]').on('keyup',function(e) {

        var value = $(this).val().toLowerCase();

        if(value == ''){
            $('.autoSuggest').hide();
        }else{

            //Filter the list of suggestions
            $(".autoSuggest ul li").filter(function () {
                if($(this).text().toLowerCase().indexOf(value) > -1){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                } else {
                    $('.autoSuggest').show();
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                }
            });

            //If there are no matching categories hide the surgest list
            if($(".autoSuggest ul li:visible").length === 0){
                $('.autoSuggest').hide();
            }
        }
    });

    //Add a category from what has been typed in
    $(document).on('click', '.add-cat', function (e) {
        e.preventDefault();
        addCategory($('input[name="product-category"]').val());
        clearCategorySearch();
    });

    //Add a suggested category to the selected list
    $(document).on('click', '.add-suggested-cat', function (e) {
        e.preventDefault();
        addCategory($(this).attr('data-category'));
        clearCategorySearch();
    });

    //Delete a category from the selected list
    $(document).on('click', '.delete-cat', function (e) {
        e.preventDefault();

        //If it was a newly added category for this page also delete from the database
        if($(this).parent().hasClass('new-item')){
            deleteCategory($(this).parent().attr('data-id'));
        }

        $(this).parent().remove();
    });

});

//Clear the category Search tool
function clearCategorySearch(){
    $(this).val('');
    $('.autoSuggest').hide();
}

//Add a category to the selected list and the database if required (Done in the AJAX)
function addCategory(catValue){
    TwistAJAX.post(
        'products/addCategory',
        { category: catValue }
        )
        .then( response => {
            $(".selectedCategories").append(response.html);
            productCategories = response.cats;
        } )
        .catch( e => {
            console.error( 'ajax error:', e );
        } );
}

//Remove a category from the database
function deleteCategory(catID){
    TwistAJAX.post(
        'products/deleteCategory',
        { category_id: catID }
    )
        .then( response => {
            productCategories = response.cats;
        } )
        .catch( e => {
            console.error( 'ajax error:', e );
        } );
}


// product tags
$(document).ready(function(){
    //Capture the enter press and add the selected tag
    $('input[name="product-tags"]').on('keydown',function(e) {
        if(e.which == 13){
            e.preventDefault();
            addTag($(this).val());
            clearTagSearch();
        }
    });

    //Watch the key presses and show a surgested list of pre-existing tags
    $('input[name="product-tags"]').on('keyup',function(e) {

        var value = $(this).val().toLowerCase();

        if(value == ''){
            $(this).find('.autoSuggestTags').hide();
        }else{

            //Filter the list of suggestions
            $(this).find(".autoSuggestTags ul li").filter(function () {
                if($(this).text().toLowerCase().indexOf(value) > -1){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                } else {
                    $(this).find('.autoSuggestTags').show();
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                }
            });

            //If there are no matching tags hide the surgest list
            if($(".autoSuggestTags ul li:visible").length === 0){
                $('.autoSuggestTags').hide();
            }
        }
    });

    //Add a tag from what has been typed in
    $(document).on('click', '.submit-tags', function (e) {
        e.preventDefault();
        addTag($('input[name="product-tags"]').val());
        clearTagSearch();
    });

    //Add a suggested tag to the selected list
    $(document).on('click', '.add-suggested-tag', function (e) {
        e.preventDefault();
        addTag($(this).attr('data-tag'));
        clearTagSearch();
    });

    //Delete a tag from the selected list
    $(document).on('click', '.delete-tag', function (e) {
        e.preventDefault();

        //If it was a newly added tag for this page also delete from the database
        if($(this).parent().hasClass('new-item')){
            deleteTag($(this).parent().attr('data-id'));
        }

        $(this).parent().remove();
    });
});

function clearTagSearch(){
    $(this).val('');
    $('.autoSuggest').hide();
}

//Add a Tags to the selected list and the database if required (Done in the AJAX)
function addTag(tagValue){
    TwistAJAX.post(
        'products/addTag',
        { tag: tagValue }
    )
        .then( response => {
            console.log(tagValue);
            $(".selectedTags").append(response.html);
            productTags = response.tags;
        } )
        .catch( e => {
            console.error( 'ajax error:', e );
        } );
}

//Remove a Tags from the database
function deleteTag(tagID){
    TwistAJAX.post(
        'products/deleteTag',
        { tag_id: tagID }
    )
        .then( response => {
            productTags = response.tags;
        } )
        .catch( e => {
            console.error( 'ajax error:', e );
        } );
}