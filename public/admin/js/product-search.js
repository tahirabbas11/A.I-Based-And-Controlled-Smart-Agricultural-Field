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
                    htmlContent +=`<div class="col-12 col-lg-6 col-xl-4">
                    <div class="box box-default">
                        <div class="fx-card-item">
                            <div class="fx-card-avatar fx-overlay-1"> <img src="${imageExist(element.image)}"
                                    alt="user">
                                <div class="fx-overlay scrl-up">
                                    <ul class="fx-info">
                                        <li><a class="btn btn-outline image-popup-vertical-fit"
                                                href="${imageExist(element.image)}"><i class="ti-search"></i></a>
                                        </li>
                                        <li class="delete">
                                            <form action="${baseUrl + '/' + element.id.toString()}" method="POST">
                                            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute("content")}">
                                            <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-outline"><i
                                                        class="ti-trash"></i></button>
                                            </form>
                                        </li>
                                        <li><a class="btn btn-outline" href="${baseUrl + '/' + element.id.toString() + '/edit'}"><i
                                                    class="ti-settings"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="fx-card-content text-left mb-0">
                                <div class="product-text">
                                    <h4 class="box-title mb-0">${element.name}</h4>
                                    <h2 class="pro-price text-blue">$${element.price}</h2>

                                </div>
                                <p class="text-muted db productdesc">${element.short_desc.substring(0,490)}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>`

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
