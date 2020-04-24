<li class="{data:new==true?'new-item':''}" data-id="{data:id}">
    <div class="text-output">
        {data:tag_name}
    </div>
    <input type="hidden" name="tag[]" value="{data:id}">
    <!--<small>
        <label class="switch">
            <input type="checkbox" name="{data:tag_name}" value="{data:tag_name}">
        </label>
    </small>-->
    <a href="/manager/twist_ecommerce/products/create?delete-tag={data:id}" class="delete-tag"><span class="far fa-times-circle"></span></a>
</li>