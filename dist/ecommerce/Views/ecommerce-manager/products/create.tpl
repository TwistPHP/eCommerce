<style>
    .tab {
        display: none;
    }
    .tabButtons li{
        background-color:#212121;
    }
    .tab.current{
        display: block;
    }
    textarea{
        width: 100%;
        padding:10px;
        font-size: 15px;
        margin: 5px 0 10px;
        height: 100px;
    }
</style>
        <form action="/manager/twist_ecommerce/products/create" method="post">
            <div class="box box100 shop">
                <div class="boxTitle">
                    <h3>Create Product</h3>
                </div>
                <div class="boxContent">
                    <input type="text" name="product-name" placeholder="Product Name">
                    <textarea name="product-description" placeholder="Product Description"></textarea>
                </div>
            </div>
            <div class="box box100">
                <div class="boxTitle">
                    <h3>Product Information</h3>
                </div>
                <div class="boxContent">
                    <ul class="tabButtons">
                        <li class="tabButton1"><span class="fas fa-info-circle"></span> General</li>
                        <li class="tabButton2"><span class="fas fa-dolly"></span> Stock</li>
                        <li class="tabButton3"><span class="fas fa-table"></span> Attributes</li>
                    </ul>
                    <div class="tabs">
                        <div class="tab tab1 general">
                            <textarea name="product-short" placeholder="Short description"></textarea>
                            <input type="text" name="product-category" placeholder="Category">
                            <input type="text" name="product-tags" placeholder="Tags">
                            <input type="number" name="product-price" placeholder="Price">
                            <input type="file" accept="jpg,png" name="product-image">
                        </div>
                        <div class="tab tab2 stock">
                            <input type="text" name="product-quantity" placeholder="Quantity">
                            <select name="stock-availability">
                                <option SELECTED disabled>Product availability</option>
                                <option value="in-stock">In stock</option>
                                <option value="out-of-stock">Out of stock</option>
                                <option value="in-stock-soon">In stock soon</option>
                            </select>
                            <input type="text" name="product-sku" placeholder="SKU">
                            <div class="product-dimensions">
                                <input type="text" name="product-length" placeholder="Length">
                                <input type="text" name="product-width" placeholder="Width">
                                <input type="text" name="product-height" placeholder="Height">
                            </div>
                            <input type="number" name="shipping-cost" placeholder="Shipping cost">
                        </div>
                        <div class="tab tab3 attributes">
                            <h2>not needed at moment</h2>
                        </div>
                    </div>
                </div>
                <div class="boxFooter">
                    <button class="button button-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('.tabButtons li').removeClass('current').first().addClass('current');
        $('.tabs .tab').removeClass('current').first().addClass('current');

        $('.tabButtons li').on('click',function(){
            var clickedIndex = $(this).index();
            $('.tabButtons li').removeClass('current').eq(clickedIndex).addClass('current');
            $('.tabs .tab').removeClass('current').eq(clickedIndex).addClass('current');
        });
    });
</script>