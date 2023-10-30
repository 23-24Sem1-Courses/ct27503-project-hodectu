   <footer class="text-center" style="background-color: #def2f1 !important;">
       <div class="text-center p-3 fw-semibold">
           © Copyright © 2023:
           <a class="text-dark fw-semibold" href="#">Bookstore</a>
       </div>
   </footer>

   <script>
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
                   Swal.fire(
                       'Deleted!',
                       'Your file has been deleted.',
                       'success'
                   )
               }
           })
       })
   </script>
   </body>

   </html>