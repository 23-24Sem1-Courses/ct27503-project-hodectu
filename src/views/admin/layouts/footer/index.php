   <footer class="text-center" style="background-color: #def2f1 !important;">
       <div class="text-center p-3 fw-semibold">
           © Copyright © 2023:
           <a class="text-dark fw-semibold" href="#">Bookstore</a>
       </div>
   </footer>

   <script>
       $().ready(() => {
           const postAjax = (url, data) => {
               $.ajax({
                   url,
                   type: 'POST',
                   data: data ? data : '',
                   success: function(res) {
                       res = JSON.parse(res);

                       Swal.fire({
                           title: `${res["error"] ? 'Lỗi' : 'Thành công'}`,
                           text: res["message"],
                           icon: `${res["error"] ? 'error' : 'success'}`,
                           confirmButtonText: 'Ok',
                           customClass: {
                               confirmButton: `${res["error"] ? 'bg-danger' : 'bg-success'}`,
                           },
                       }).then(() => {
                           if (!res["error"]) {
                               window.location.reload();
                           }
                       })

                   },
                   error: function(error) {
                       console.log(error);
                   }
               })
           }

           $('.btn-delete').on('click', function() {
               Swal.fire({
                   title: 'Xác nhận xóa?',
                   text: "Bạn chắc chắn muốn xóa sản phẩm này?",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Xác nhận',
                   cancelButtonText: 'Hủy'
               }).then((result) => {
                   if (result.isConfirmed) {
                       const deleteBtn = $(this);
                       const bookId = $(this).parent().find('#book_id').val();

                       postAjax('/admin/delete/' + bookId);

                       deleteBtn.closest('.book').remove();
                   }
               })
           })

           $('.btnUpdate').on('click', function() {
               Swal.fire({
                   title: 'Cập nhật trạng thái?',
                   // text: "Bạn chắc chắn muốn hủy đơn hàng này?",
                   icon: 'warning',
                   showCancelButton: true,
                   showDenyButton: true,
                   confirmButtonText: "Giao hàng",
                   denyButtonText: `Hủy đơn`,
                   cancelButtonText: `Quay lại`,
                   confirmButtonColor: '#3085d6',
                   denyButtonColor: '#d33',

               }).then((result) => {
                   const order = $(this).closest('.order');
                   const orderId = order[0].dataset.order_id;

                   const data = {
                       orderId,
                       status: 1
                   }

                   if (result.isConfirmed) {
                       postAjax('/admin/order/update', data);
                   } else if (result.isDenied) {
                       data.status = 2
                       postAjax('/admin/order/update', data);
                   }
               })
           })
       })
   </script>
   </body>

   </html>