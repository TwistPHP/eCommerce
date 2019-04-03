<li>
    <div class="text-output">
        {data:cat_name}
    </div>
    <input type="hidden" name="category[]" value="{data:id}">
    <!--<small>
        <label class="switch">
            <input type="checkbox" name="{data:cat_name}" value="{data:cat_name}">
        </label>
    </small>-->
    <a href="/manager/twist_ecommerce/products/create?delete-cat={data:id}" class="delete-cat"><span class="far fa-times-circle"></span></a>
</li>