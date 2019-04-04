
var productCategories = [];

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

        //If it was a newly added category for this page also delete form the database
        if($(this).parent().hasClass('new-item')){
            deleteCategory($(this).parent().attr('data-id'));
        }

        $(this).parent().remove();
    });

});


var TwistAJAX = new twistajax( '/manager/ajax/ecommerce' );

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