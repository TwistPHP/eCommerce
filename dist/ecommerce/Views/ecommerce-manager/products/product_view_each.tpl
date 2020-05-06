<li class="fullWidth flex-row flex-space-between">
    <div class="product thumbnail">
        <img src="{data:featured_asset}" alt="{data:name}">
    </div>
    <div class="product title">
        <h3>{data:name}</h3>
    </div>
    <div class="product sku">
        <span>{data:sku}</span>
    </div>
    <div class="product price">
        <span>{data:price}</span>
    </div>
    <div class="product quantity">
        <span>{data:quantity}</span>
    </div>
    <div class="product availability">
        <span>{data:availability=='in-stock' ? 'In Stock' ? data:availability=='out-of-stock'? 'Out Of Stock'? data:availability=='in-stock-soon'? 'In Stock Soon'}</span>
    </div>
    <div class="product createdDate">
       {prettytime[data:created]}
        <span class="fas fa-info-circle"></span>
        <div class="extraInfo">
            Created: {data:published_t_d}
        </div>
    </div>
    <div class="product Options">
        <ul>
            <li class="optionButton Green">
                <a href="/manager/twist_ecommerce/products/edit/{data:id}">
                    <span class="far fa-edit"></span>
                </a>
            </li>
            <li class="optionButton Red">
                <a href="?delete-product={data:id}">
                    <span class="far fa-trash-alt"></span>
                </a>
            </li>
        </ul>
    </div>
</li>