const baseUrl = document.URL.split('?')[0];

function imageExist(image) {
    return (image) ? window.location.origin + '/' + image : window.location.origin + '/admin/image/no-image.jpg';
}

function statusCheck(status, badge) {
    if (badge == 'badge')
        return status ? 'badge-primary' : 'badge-danger';
    else
        return status ? 'Active' : 'Deactive';
}
$("#search").keyup(function () {
    $('#pagination ul').hide();
    $.ajax({
        url: baseUrl,
        type: "get",
        data: {
            onChange: true,
            search: $(this).val()
        },
        dataType: "json",
        success: function (response) {
            if (response.status) {

                var htmlContent = "";
                response.data.data.forEach(element => {
                    htmlContent += `<div class="col-md-12 col-lg-4">
                 <div class="card">
                    <img class="card-img-top"
                 src="${imageExist(element.image)}">
                     <div class="card-body">
                         <h4 class="card-title">${element.name}</h4>
                     </div>
                     <div class="card-footer justify-content-between d-flex">
                         <ul class="list-inline mb-0 mr-2">
                             <span
                                 class="badge ${statusCheck(element.status, 'badge')}">${statusCheck(element.status, 'status')}</span>
                         </ul>
                         <ul class="list-inline mb-0">
                             <li><a href="${baseUrl + '/' + element.id.toString() + '/edit'}">Edit</a></li>
                             <li>
                                 <form action="${baseUrl + '/' + element.id.toString()}" method="POST">
                                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute("content")}">
                                     <input type="hidden" name="_method" value="DELETE">
                                     <button type="submit" class="delete">Delete</button>
                                 </form>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>`;
                });
                if (htmlContent) {
                    $('#section-content').html(htmlContent);

                    if (response.lastPage > 1) {
                        $('#pagination ul').html('');

                        $('#pagination ul').append(
                            $('<li>').append(
                                $('<a>').text('<')))
                        for (let index = 0; index < response.lastPage; index++) {
                            $('#pagination ul').append(
                                $('<li>').append(
                                    $('<a>').attr(
                                        {
                                            href: (!$('#search').val()) ? baseUrl + '?page=' + (index + 1).toString() : baseUrl + '?search=' + $('#search').val() + '&page=' + (index + 1).toString(),
                                            class: (index == 0) ? 'active' : ''
                                        }).append(
                                            $('<span>').attr('class', 'tab').append((index + 1).toString())
                                        )))

                        }

                        $('#pagination ul').append(
                            $('<li>').append(
                                $('<a>').text('>')))
                        $('#pagination ul').show();}

                } else {
                    $('#section-content').html(`
                                                <div class="alert alert-primary error" role="alert">
                                                    No items found.
                                                </div>
                                                `)
                }

            }

        }
    })
});
