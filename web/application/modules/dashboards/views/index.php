<div class="col-lg-6 center-clock">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">List Jam Kerja</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                    <table id="example" class="table table-hover" width="100%" data-toggle="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Istirahat</th>
                            <th>Lembur</th>
                        </tr>
                        </thead>
                        <tbody id="listJamKerja">
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Jam kerja</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                    <form class="was-validated" id="addForm">
                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-price">Nama Shift</label>
                                            <input type="number" class="form-control" id="form-2-price" placeholder="Isi harga disini yaaa" required="">
                                            <div class="invalid-feedback">Harga wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-price">Jam Masuk</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Sebelum</label>
                                            <input class="form-control" id="picker_in_range_start">
                                            <div class="invalid-feedback">Masuk wajib diisi!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Pas</label>
                                            <input class="form-control" id="picker_in">
                                            <div class="invalid-feedback">Masuk wajib diisi!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Sesudah</label>
                                            <input class="form-control" id="picker_in_range_end">
                                            <div class="invalid-feedback">Masuk wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-price">Jam Keluar</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Sebelum</label>
                                            <input class="form-control" id="picker_out_range_start">
                                            <div class="invalid-feedback">Keluar wajib diisi!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Pas</label>
                                            <input class="form-control" id="picker_out">
                                            <div class="invalid-feedback">Keluar wajib diisi!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="form-2-name">Sesudah</label>
                                            <input class="form-control" id="picker_out_range_end">
                                            <div class="invalid-feedback">Keluar wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-price">Istirahat</label>
                                            <input type="number" class="form-control" id="form-2-price" placeholder="Isi harga disini yaaa" required="">
                                            <div class="invalid-feedback">Istirahat wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="form-2-lembur">Lembur</label>
                                            <select class="custom-select" id="form-2-lembur" name="lembur" placeholder="Pilih Ya/Tidak" required="">
                                                <option value="0" selected>Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                            <div class="invalid-feedback">Pembayaran wajib diisi!</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" class="btn btn-primary mb-4">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    refreshJamKerja()
    $('#picker_in_range_start').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'green'
    });

    $('#picker_in').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'green'
    });

    $('#picker_in_range_end').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'green'
    });

    $('#picker_out_range_start').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'red'
    });

    $('#picker_out').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'red'
    });

    $('#picker_out_range_end').mdtimepicker({
        format: 'hh:mm tt',
        theme: 'red'
    });
})

function refreshJamKerja(){
        $.ajax({
                url: base_url + "attandances/rules",
                type: 'GET',
                dataType: 'json',
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var html = '';
                    for (let i = 0; i < response.length; i++) {
                        html += `
                        <tr>
                        <td>`+ parseInt(i+1) +`</td>
                        <td>`+ response[i].name +`</td>
                        <td>`+ response[i].role.name +`</td>
                        <td>`+ response[i].start_time +`</td>
                        <td>`+ response[i].end_time +`</td>
                        <td>`+ response[i].rest_time +`</td>
                        <td>`+ response[i].is_lembur +`</td>
                        </tr>
                        `;
                    }

                    $("#listJamKerja").html(html)

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