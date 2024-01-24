<div id="add_new_product_form">
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="message"></div>
            </div>
        </div>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" id="name"
                       placeholder="Name" minlength="3" maxlength="100">
            </div>
            <div class="col">
                <input type="number" class="form-control" id="quantity"
                       placeholder="quantity" min="1" max="100">
            </div>
            <div class="col">
                <input type="text" class="form-control" id="price"
                       placeholder="price" min="1" max="100">
            </div>
            <div class="col">
                <input type="number" class="form-control" id="category_id"
                       placeholder="category Id" min="1">
            </div>
            <div class="col">
               <button type="button" class="btn btn-success text-dark" id="add">
                   Save
               </button>
            </div>
        </div>
    </div>
</div>
