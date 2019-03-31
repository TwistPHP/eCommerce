<style>
    textarea{
        width: 100%;
        padding:10px;
        font-size: 15px;
        margin: 5px 0 10px;
        height: 100px;
    }
</style>
        <h1>Create Product</h1>
        <p>Create your product here! add all the information about the product, dont worry if you miss content out can always be edited later on.</p>
        <form action="/manager/twist_ecommerce/products/create" method="post">
            <div class="box box75 shop">
                <div class="boxTitle">
                    <h3>Create Product</h3>
                </div>
                <div class="boxContent">
                    <input type="text" name="product-name" placeholder="Product Name">
                    <textarea name="product-description" placeholder="Product Description"></textarea>
                </div>
                <div class="boxFooter"></div>
            </div>
            <div class="box box25">
                <div class="boxTitle">
                    <h3>Product image</h3>
                </div>
                <div class="boxContent">
                    {asset:upload,accept='.jpg|.jpeg|.png|.gif',name=product_image,id=product_image,uri='/manager/upload/asset/products'}
                </div>
                <div class="boxFooter"></div>
            </div>

            <div class="box box75 no-background">
                <div class="tabContainer">
                    <ul class="tabButtons">
                        <li><i class="fas fa-info-circle"></i> General</li>
                        <li><i class="fas fa-dolly"></i> Stock</li>
                        <li><i class="fas fa-table"></i> Attributes</li>
                    </ul>
                    <div class="tab tab1 general">

                        <div class="box">
                            <div class="boxTitle">
                                <h3>General</h3>
                            </div>
                            <div class="boxContent">
                                <input type="text" name="product-sku" placeholder="SKU">
                                <textarea name="product-short" placeholder="Short description"></textarea>
                                <input type="number" name="product-price" placeholder="Price">
                                <div class="product-dimensions">
                                    <input type="text" name="product-length" placeholder="Length">
                                    <input type="text" name="product-width" placeholder="Width">
                                    <input type="text" name="product-height" placeholder="Height">
                                </div>
                            </div>
                            <div class="boxFooter"></div>
                        </div>
                    </div>
                    <div class="tab tab2 stock">
                        <div class="box">
                            <div class="boxTitle">
                                <h3>Stock</h3>
                            </div>
                            <div class="boxContent">
                                <input type="text" name="product-quantity" placeholder="Quantity">
                                <select name="stock-availability">
                                    <option SELECTED disabled>Product availability</option>
                                    <option value="in-stock">In stock</option>
                                    <option value="out-of-stock">Out of stock</option>
                                    <option value="in-stock-soon">In stock soon</option>
                                </select>
                                <input type="number" name="shipping-cost" placeholder="Shipping cost">
                            </div>
                            <div class="boxFooter"></div>
                        </div>
                    </div>
                    <div class="tab tab3 attributes">
                        <div class="box">
                            <div class="boxTitle">
                                <h3>Attributes</h3>
                            </div>
                            <div class="boxContent">
                                <h2>not needed at moment</h2>
                            </div>
                            <div class="boxFooter"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box25 no-background">
                <div class="box no-background">
                    <div class="boxTitle">
                        <h3>Categories</h3>
                    </div>
                    <div class="boxContent">
                        <p>Select or create a new Category</p>
                        <div class="searchable-input">
                            <input type="text" name="product-category" placeholder="Category">
                            <a href="#" class="submit-category"><span class="fas fa-plus-circle"></span></a>
                        </div>
                        <div class="categories-output">
                            <ul class="results">
                                <div class="current">
                                    {data:categories}
                                </div>

                            </ul>
                        </div>
                    </div>
                    <div class="boxFooter"></div>
                </div>
                <div class="box no-background">
                    <div class="boxTitle">
                        <h3>Tags</h3>
                    </div>
                    <div class="boxContent">
                        <p>Select or create a new Tag</p>
                        <div class="searchable-input">
                            <input type="text" name="product-tags" placeholder="Tags">
                            <a href="#" class="submit-tags"><span class="fas fa-plus-circle"></span></a>
                        </div>

                        <div class="tags-output">
                            <ul class="results">
                                <div class="current">
                                    {data:tags}
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="boxFooter"></div>
                </div>
            </div>
            <div class="buttonBar">
                <button type="submit" class="button button-primary button-3d">Submit</button>
            </div>
        </form>
