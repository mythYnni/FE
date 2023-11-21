var links = document.querySelectorAll('.blog_detail_price');

links.forEach(function (link) {
     link.addEventListener('click', function (event) {
          event.preventDefault();
          html = '';
          $.ajax({
               url: '/bang-gia-dich-vu',
               type: 'GET',
               success: function (response) {
                    console.log(response);
                    for (const element of response) {
                         html += '<tr>';
                         html += '<td style = "vertical-align: middle; color: black; font-size: 16px; font-weight: 600;">' + element.nameService +'</td>';
                         html += '<td style = "vertical-align: middle; color: black; font-size: 16px; font-weight: 700;">' + element.price + '</td>';
                         html += '<td style = "vertical-align: middle; color: black; font-size: 15px;">' + element.workingTime +'</td>';
                         html += '<td style = "vertical-align: middle; color: black; font-size: 15px;">' + element.content +'</td>';
                         html += '</tr>';
                    }
                    // gán nội dung của biến html vào thẻ có id="list"
                    $('#modal-body-price').html(html);
                    $('#myModal_price').modal('show')
               },
               error: function (xhr) {
                    console.log(xhr.responseText);
               }
          });
     });
});
