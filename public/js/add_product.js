'use strict';
let rows = 0;
// Counting rows
$("#table tr").each(()=>{
    rows++;
});
$('#add').on('click', function (){
    let name = $('#name').val();
    let price = $('#price').val();
    let quantity = $('#quantity').val();
    let category_id = $('#category_id').val();

    let form = new FormData();
    form.append('name',name);
    form.append('price',price);
    form.append('quantity',quantity);
    form.append('category_id',category_id);
    let path = "/products";
    axios.post(path, form)
        .then((res) => {
            console.log(res['data']['data']['products']);
            let data = res['data']['data']['products'];
            $('#message').empty();
            // Empty Input
            $('#name').val('');
            $('#price').val('');
            $('#quantity').val('');
            $('#category_id').val('');


            // $('#table tbody tr:before').append(``);

            $('#table tbody').append(`<tr>
            <td>${data['id']}</td>
            <td>${data['name']}</td>
            <td>${data['price']}</td>
            <td>${data['quantity']}</td>
            <td>${data['category_id']}</td>
            </tr>`);
            $('#message').append(`
            <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Add Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            `)

        })
        .catch((err) => {
            console.log(err);
            $('#message').empty();
            console.log(err['response']['data']['message']);
            $('#message').append(`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ${err['response']['data']['message']}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            `)
        });


});
