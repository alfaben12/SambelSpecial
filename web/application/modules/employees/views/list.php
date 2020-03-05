<div class="col-lg-12">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Report Employee</h4>
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-box mb-5">
                    <div class="card-body">
                    <table id="example" class="table table-hover" width="100%" data-toggle="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Laporan</th>
                        </tr>
                        </thead>
                        <tbody id="listEmployees">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){
    refreshEmployee()
})

    function refreshEmployee(){
        $.ajax({
                url: base_url + "employees",
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var html = '';
                    for (let i = 0; i < response.length; i++) {
                        html += `
                        <tr>
                        <td>`+ parseInt(i+1) +`</td>
                        <td>`+ response[i].fullname +`</td>
                        <td>`+ response[i].role.name +`</td>
                        <td>
                            <a href="<?= base_url() ?>reports/index/`+ response[i].id +`/employeeid">Lihat laporan</a>
                        </td>
                        </tr>
                        `;
                    }

                    $("#listEmployees").html(html)
                    $('[data-toggle="datatable"]').DataTable({
                        responsive: !0,
                        autoFill: !0,
                        keys: !0,
                        lengthMenu: [ [ 5, 10, 15, -1 ], [ 5, 10, 15, 'All' ] ],
                        buttons: [ 'copy', 'csv', 'excel', 'pdf' ],
                        columnDefs: [ { targets: 'no-sort', orderable: !1 } ]
                    });
                },
                error: function(response, textStatus, errorThrown) {
                    console.log('error')
                },
                complete: function() {
                    console.log('complete')
                }
            });
    }
</script>