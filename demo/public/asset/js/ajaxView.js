var links = document.querySelectorAll('.showacc');

links.forEach(function (link) {
     link.addEventListener('click', function (event) {
          event.preventDefault();
          var id = this.dataset.id;
          html = '';
          $.ajax({
               url: '/s&d-admin/chi-tiet-tai-khoan/' + id,
               type: 'GET',
               success: function (response) {
                    html += '<div class="row">';
                    html += '<div class="col-sm-12 col-md-5" style="text-align: center;">';
                    html += '<img src=' + response.imageAcount + ' alt="" style="padding: 5px;width: 300px; border-radius: 50%; border: 2px solid gray; object-fit: cover; height: 300px;">';
                    html += '</div>';
                    html += '<div class="col-sm-12 col-md-7">';
                    html += '<div class="panel-heading">';
                    html += '<div class="pull-left">';
                    html += '<h6 class="panel-title txt-dark">Thông Tin Tài Khoản</h6>';
                    html += '</div>';
                    html += '<div class="clearfix"></div>';
                    html += '</div>';
                    html += '<div class="panel-wrapper collapse in">';
                    html += '<div class="panel-body">';
                    html += '<ul class="list-icons">';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> ';
                    html += '<small class="mb-10">Họ Và Tên: <small>' + response.fullName + '</small></small></li>';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i>';
                    html += '<small class="mb-10">Tài Khoản: <small>' + response.accountName + '</small></small></li>';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> ';
                    html += '<small class="mb-10">Phone: <small>' + response.phone + '</small></small></li>';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> ';
                    html += '<small class="mb-10">Email: <small>' + response.email + '</small></small></li>';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> ';
                    html += '<small class="mb-10">Giới Tính: <small>' + (response.sex == 1 ? 'Nữ' : 'Nam') + '</small></small></li>';
                    html += '<li class="mb-10"><i class="fa fa-angle-double-right text-info mr-5"></i> ';
                    html += '<small class="mb-10">Vai Trò: <small>' + (response.decentralization == 1 ? 'Nhà Phát Triển' : 'Nhà Thiết Kế') + '</small></small>';
                    html += '</li></ul></div></div></div></div>';
                    // gán nội dung của biến html vào thẻ có id="list"
                    $('#modal-body').html(html);
                    $('.modal-title').html("Tài Khoản");
                    $('.bs-example-modal-md').modal('show')
               },
               error: function (xhr) {
                    console.log(xhr.responseText);
               }
          });
     });
});

var links = document.querySelectorAll('.showcontent');

links.forEach(function (link) {
     link.addEventListener('click', function (event) {
          event.preventDefault();
          var id = this.dataset.id;
          html = '';
          $.ajax({
               url: '/s&d-admin/content-tu-van-phap-luat/' + id,
               type: 'GET',
               success: function (response) {
                    html += '<div class="row">';
                    html += '<div class="col-sm-12 col-md-12">';
                    html += '<h5 style="text-align: center;">' + response.title +'</h5>';
                    html += '<br/>';
                    html +=  response.content;
                    html += '</div></div>';
                    // gán nội dung của biến html vào thẻ có id="list"
                    $('#modal-body').html(html);
                    $('.modal-title').html("Nội Dung");
                    $('.bs-example-modal-md').modal('show')
               },
               error: function (xhr) {
                    console.log(xhr.responseText);
               }
          });
     });
});

var links = document.querySelectorAll('.showpProce');

links.forEach(function (link) {
     link.addEventListener('click', function (event) {
          event.preventDefault();
          var id = this.dataset.id;
          html = '';
          $.ajax({
               url: '/s&d-admin/content-thu-tuc-hanh-chinh/' + id,
               type: 'GET',
               success: function (response) {
                    html += '<div class="row">';
                    html += '<div class="col-sm-12 col-md-12">';
                    html += '<h5 style="text-align: center;">' + response.title + '</h5>';
                    html += '<br/>';
                    html += response.content;
                    html += '</div></div>';
                    // gán nội dung của biến html vào thẻ có id="list"
                    $('#modal-body').html(html);
                    $('.modal-title').html("Nội Dung");
                    $('.bs-example-modal-md').modal('show')
               },
               error: function (xhr) {
                    console.log(xhr.responseText);
               }
          });
     });
});