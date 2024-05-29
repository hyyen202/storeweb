// // Hàm phân trang
// function paginateTable(pageNumber = 1) {
//     var table = document.querySelector('.table');
//     var rows = table.rows;
//     var pageSize = 8; // Số hàng trên mỗi trang
//     var pageCount = Math.ceil(rows.length / pageSize); // Tính toán số trang

//     // Ẩn tất cả các hàng
//     for (var i = 1; i < rows.length; i++) {
//         rows[i].style.display = 'none';
//     }

//     // Hiển thị trang được chọn
//     var start = pageNumber * pageSize - pageSize + 1;
//     var end = pageNumber * pageSize;
//     for (var j = start; j <= end && j < rows.length; j++) {
//         rows[j].style.display = '';
//     }

//     // Tạo các nút phân trang
//     var pagination = document.getElementById('pagination');
//     // pagination.innerHTML = ''; // Xóa nút phân trang cũ
//     for (var i = 0; i < pageCount; i++) {
//         var currentPageNumber = i + 1;
//         var button = document.createElement('button');
//         button.innerText = currentPageNumber;
//         button.classList.add("btn", "btn-outline-secondary", "btn-sm", "me-2","pagination-button");
//         button.style.padding = "0.25rem 0.5rem";
//         // Gắn sự kiện click cho từng nút để chuyển đến trang tương ứng
//         button.addEventListener('click', function () {
//             var selectedPageNumber = parseInt(this.innerText);
//             paginateTable(selectedPageNumber);
//         });
//         pagination.appendChild(button);
//     }

// }


// // Gọi hàm phân trang với trang 1 khi tài liệu được tải
// window.onload = function () {
//     paginateTable(1);
// };