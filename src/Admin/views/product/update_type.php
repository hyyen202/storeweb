<?php 
$id = $_GET['i'];
$type = detail_type($db, $id);
foreach ($type as $category) { 
?>
<div class="d-flex align-items-center">
    <p class="mb-3">CẬP NHẬT LOẠI</p>
</div>
<div id="result"></div>
<form id="update_type_form" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label for="cate" class="form-control-label">Tên Loại</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="type" name="type" value="<?php echo $category['name']; ?>" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="status_choose" class="form-control-label">Trạng thái</label>
                    <select class="form-control" id="status" name="status_choose">
                        <?php 
                        $status = ($category['status'] == 1);
                        if ($status) {
                            echo '<option value="1" selected>Đang hoạt động</option>';
                            echo '<option value="0">Ngưng hoạt động</option>';
                        } else {
                            echo '<option value="1">Đang hoạt động</option>';
                            echo '<option value="0" selected>Ngưng hoạt động</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-secondary btn-sm ms-auto" type="submit" id="update_type">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php  
}
?>
<div id="pagination" class="text-center my-4"></div>
<style>
.limited-length {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Form submission
    $('#update_type_form').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        let id = <?php echo $id; ?>; // Get the category ID
        let status = $('#status').val();
        let type = $('#type').val();
        var formData = new FormData();
        
        formData.append('type', type);
        formData.append('id', id);
        formData.append('status', status);

        $.ajax({
            url: '../src/Admin/views/product/action.php?act=update_type',
            type: 'POST',
            data: formData,
            contentType: false, // Ensure multipart/form-data is set
            processData: false, // Prevent jQuery from converting the data
            success: function(response) {
                let res = JSON.parse(response);
                $('#result').html(
                    `<div class="alert alert-${res.type}" role="alert">${res.message}</div>`
                );
                $('#result').fadeIn('slow', function() {
                    $('#result').delay(5000).fadeOut();
                });
                if (res.type === "success") {
                    $("#update_category_form")[0].reset(); // Reset the form after successful submission
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>
