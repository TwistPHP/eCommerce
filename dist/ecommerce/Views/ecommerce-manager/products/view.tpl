<div class="box box100 view-allp">
    <div class="boxContent">
        <h2>All current products</h2>
        <p>Here is a list of all current products on the system. You can either create,edit or delete products.</p>
        <p>create a product here <a href="/manager/twist_ecommerce/products/create" title="create product"><span class="fas fa-shopping-bag"></span> Create</a></p>
    </div>
    <div class="boxFooter"></div>
</div>
<form class="filter" method="post">
    <select name="order">
        <option value="DESC" SELECTED>Normal Order</option>
        <option value="ASC">Reverse Order</option>
    </select>
    <select name="category">
        <option SELECTED disabled>Select Category</option>
        <option value="reset">All Categories</option>
        {data:categories}
    </select>
    <button type="submit" class="button button-primary button-3d Green">Filter</button>
</form>
<div class="box box100 product-listing">
    <div class="boxHeader Green" style="display:{data:products!=''?'block' : 'none'};">
        <ul class="flex-row flex-space-between">
            <li>Thumbnail</li>
            <li>Product Title</li>
            <li>SKU</li>
            <li>Price</li>
            <li>Stock</li>
            <li>Availability</li>
            <li>Published</li>
            <li></li>
        </ul>
    </div>
    <ul class="product-viewing">
        {data:products}
        {data:products==''? '<h1>No Products Found</h1><p>Click create to get started.</p> : '' '}
    </ul>
    <div class="boxFooter"></div>
</div>