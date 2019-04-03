
var productCategories = [];

$(document).ready(function () {

    $('.delete-cat').on('click', function(){
       confirm("Are you sure you want to delete this Product Category");
    });
    $('.delete-tag').on('click', function(){
       confirm("Are you sure you want to delete this Product Tag");
    });

    $('.submit-category').on('click', function(){
        var catValue = $('input[name="product-category"]').val();
        if (catValue != ''){
            addCategory(catValue);
            //$(".categories-output .current").before("<li><div class='text-output'>"+ catValue +"</div><small><label class='switch'><input type='checkbox' name='"+catValue+"' value='"+catValue+"' checked><div class='slider round'></div></label></small><a href='#' class='remove-item'><span class='far fa-times-circle'></span></a></li>");
            $('input[name="product-category"]').val('');
            //removeItem();
        }
    });
    $('.submit-tags').on('click', function(){
        var tagValue = $('input[name="product-tags"]').val();
        if (tagValue != ''){
            $(".tags-output .current").before("<li><div class='text-output'>"+ tagValue +"</div><small><label class='switch'><input type='checkbox' name='"+tagValue+"' value='"+tagValue+"' checked><div class='slider round'></div></label></small><a href='#' class='remove-item'><span class='far fa-times-circle'></span></a></li>");
            $('input[name="product-tags"]').val('');
            //removeItem();
        }
    });

    $(document).on('keypress', function(e) {

        if(e.which == 13){
            e.preventDefault();
            var catValue = $('input[name="product-category"]').val();
            var tagValue = $('input[name="product-tags"]').val();

            if (catValue != ''){
                addCategory(catValue);
                //$(".categories-output .current").before("<li><div class='text-output'>"+ catValue +"</div><small><label class='switch'><input type='checkbox' name='"+catValue+"' value='"+catValue+"' checked><div class='slider round'></div></label></small><a href='#' class='remove-item'><span class='far fa-times-circle'></span></a></li>");
                $('input[name="product-category"]').val('');
                //removeItem();
            }

            if (tagValue != ''){
                $(".tags-output .current").before("<li><div class='text-output'>"+ tagValue +"</div><small><label class='switch'><input type='checkbox' name='"+tagValue+"' value='"+tagValue+"' checked><div class='slider round'></div></label></small><a href='#' class='remove-item'><span class='far fa-times-circle'></span></a></li>");
                $('input[name="product-tags"]').val('');
                //removeItem();
            }
        }else{
            //Go through cats
            productCategories.each({
                con
            });
        }
    });

    $(document).on('click', '.delete-cat', function (e) {
        e.preventDefault();
        $(this).parent().remove();
    });
});


var TwistAJAX = new twistajax( '/manager/ajax/ecommerce' );

function addCategory(catValue){

    TwistAJAX.post(
        'products/addCategory',
        { category: catValue, james:'test' }
        )
        .then( response => {
            $(".categories-output .current").before(response.html);
            productCategories = response.cats;
        } )
        .catch( e => {
            console.error( 'ajax error:', e );
        } );
}