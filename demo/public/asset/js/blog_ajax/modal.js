var links = document.querySelectorAll('.blog_detail');

links.forEach(function (link) {
     link.addEventListener('click', function (event) {
          event.preventDefault();
          var id = this.dataset.id;
          html = '';
          $.ajax({
               url: '/chi-tiet-tu-van-phap-luat/' + id,
               type: 'GET',
               success: function (response) {
                    console.log(response.image);
                    if (response.image != null) {
                         html += '<div class="col-md-9 blog_details">';
                         html += '<h5 style="text-align: center;">' + response.title + '</h5>';
                         html += '<br/>';
                         html += response.content;
                         html += '</div>';
                         html += '<div class="col-md-3" style="background: #b6a58d; padding: 15px; border-radius: 8px; height: 100%;">';
                         html += '<h6 style="color: black; font-weight: 700; margin-bottom: 15px;"> Quảng Cáo </h6>';
                         html += '<a target="_blank" class="item" href="' + response.link +'"><img src="' + response.image + '" class="rounded" alt="Cinque Terre" style="width: 100%;"></a>';
                         html += '</div>';
                    } else {
                         html += '<div class="col-md-12 blog_details">';
                         html += '<h5 style="text-align: center;">' + response.title + '</h5>';
                         html += '<br/>';
                         html += response.content;
                         html += '</div>';
                    }
                    // gán nội dung của biến html vào thẻ có id="list"
                    $('#modal-body').html(html);
                    $('#myModal_blog').modal('show')
               },
               error: function (xhr) {
                    console.log(xhr.responseText);
               }
          });
     });
});