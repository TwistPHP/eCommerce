<li>
    <div class="text-output">
        {data:tag_name}
    </div>
    <small>
        <label class="switch">
            <input type='checkbox' name="{data:tag_name}" value="{data:tag_name}">
        </label>
    </small>
    <a href="/manager/twist_ecommerce/products/create?delete-tag={data:id}" class='delete-tag'>
        <span class='far fa-times-circle'></span>
    </a>
</li>