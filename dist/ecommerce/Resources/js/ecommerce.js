$(document).ready(function () {

    $('.submit-category').on('click', function(){
        var catValue = $('input[name="product-category"]').val();
        if (catValue != ''){
            $(".categories-output ul").before("<li>"+ catValue +"</li>");
            $('input[name="product-category"]').val('');
        }
    });
    $('.submit-tags').on('click', function(){
        var tagValue = $('input[name="product-tags"]').val();
        if (tagValue != ''){
            $(".tags-output ul").before("<li>"+ tagValue +"</li>");
            $('input[name="product-tags"]').val('');
        }
    });

    $(document).on('keypress', function(e) {

        if(e.which == 13){
            e.preventDefault();
            var catValue = $('input[name="product-category"]').val();
            var tagValue = $('input[name="product-tags"]').val();

            if (catValue != ''){
                $(".categories-output ul").before("<li>"+ catValue +"</li>");
                $('input[name="product-category"]').val('');
            }

            if (tagValue != ''){
                $(".tags-output ul").before("<li>"+ tagValue +"</li>");
                $('input[name="product-tags"]').val('');
            }
        }
    });
});