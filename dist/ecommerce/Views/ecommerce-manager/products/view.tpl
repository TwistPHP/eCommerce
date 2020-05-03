<div class="box box100 view-allp">
    <div class="boxContent">
        <h2>All current products</h2>
        <p>Here is a list of all current products on the system. You can either create,edit or delete products.</p>
        <p>create a product here <a href="/manager/twist_ecommerce/products/create" title="create product"><span class="fas fa-shopping-bag"></span> Create</a></p>
    </div>
    <div class="boxFooter"></div>
</div>
<div class="box box100 product-listing">
    <div class="boxHeader Green">
        <ul class="flex-row flex-space-between">
            <li>Thumbnail</li>
            <li>Product Title</li>
            <li>SKU</li>
            <li>Price</li>
            <li>Stock</li>
            <li>Availability</li>
            <li>Publish Date</li>
            <li></li>
        </ul>
    </div>
    <ul class="product-viewing">
        {data:products}
    </ul>
    <div class="boxFooter"></div>
</div>