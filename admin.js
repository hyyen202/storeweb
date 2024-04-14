// $(document).ready(function() {
//     // Handling form submission for adding products
//     $('#add').submit(function (e) {
//         e.preventDefault();
//         let type = $('#type').val(),
//             category = $('#category').val(),
//             product = $('#product').val(),
//             qty = $('#qty').val(),
//             price = $('#price').val(),
//             discount = $('#discount').val(),
//             detail = $('#detail').val();
//         var formData = new FormData();
//         var img = $('#img')[0].files;
        
//         for (var i = 0; i < img.length; i++) {
//             formData.append('img[]', img[i]);
//         }
        
//         // Append other form data
//         formData.append('type', type);
//         formData.append('category', category);
//         formData.append('product', product);
//         formData.append('qty', qty);
//         formData.append('price', price);
//         formData.append('discount', discount);
//         formData.append('detail', detail);

//         $.ajax({
//             url: 'src/Admin/views/product/action.php?act=add',
//             type: 'POST',
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function (response) {
//                 let res = JSON.parse(response);
//                 $('#result').html(`<div class="alert alert-${res.type}" role="alert">${res.message}</div>`);
//                 $('#result').fadeIn('slow', function(){
//                     $('#result').delay(5000).fadeOut();
//                 });
//                 if(res.type == "success"){
//                     $("#add")[0].reset();
//                 }
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });
//         // Handling form submission for adding category
//     $('#add_category').click(function (e) {
//         e.preventDefault();
//         let category = $('#category').val();

//         $.ajax({
//             url: '../src/Admin/views/product/action.php?act=add_category',
//             type: 'POST',
//             data: { category: category },
//             success: function (response) {
//                 let res = JSON.parse(response);
//                 $('#result').html(`<div class="alert alert-${res.type}" role="alert">${res.message}</div>`);
//                 $('#result').fadeIn('slow', function(){
//                     $('#result').delay(5000).fadeOut();
//                 });
//                 if(res.type == "success"){
//                     $("#add_category_form")[0].reset();
//                 }
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });  
// }); 
    

