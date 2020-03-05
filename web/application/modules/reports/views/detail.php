
<div class="col-lg-12">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Report Employee</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                    <table id="example" class="table table-hover" width="100%" data-toggle="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>tanggal</th>
                            <th>scan masuk</th>
                            <th>masuk info</th>
                            <th>waktu</th>
                            <th>keluar</th>
                            <th>keluar info</th>
                            <th>waktu</th>
                            <th>total jam kerja</th>
                            <th>shift</th>
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
    function convertToTime(sec){ // day, h, m and s
    var seconds = Math.abs(sec)
  var days     = Math.floor(seconds / (24*60*60));
      seconds -= days    * (24*60*60);
  var hours    = Math.floor(seconds / (60*60));
      seconds -= hours   * (60*60);
  var minutes  = Math.floor(seconds / (60));
      seconds -= minutes * (60);
  return hours+"h, "+minutes+"m, "+seconds+"s";
}
$(document).ready(function(){
    refreshEmployee()
})

    function refreshEmployee(){
        $.ajax({
                url: base_url + "attandances/<?= $this->uri->segment(3) ?>/employeeid",
                type: 'GET',
                dataType: 'json',
                async: true,
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var html = '';
                    for (let i = 0; i < response.length; i++) {
                    if(Array.isArray(response[i])){
                            html += `
                            <tr>
                            <td>`+ parseInt(i+1) +`</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            <td>Libur</td>
                            </tr>`
                        }else{
                            let time_in;
                            let time_out;
                            if(response[i].message[1][0] > 0){
                                time_in = convertToTime(response[i].message[1][0])
                            }else{
                                time_in = ''
                            }
                            if(response[i].message[1][1] > 0){
                                time_out = convertToTime(response[i].message[1][1])
                            }else{
                                time_out = ''
                            }
                            html += `
                            <tr>
                            <td>`+ parseInt(i+1) +`</td>
                            <td>`+ response[i].scan_date +`</td>
                            <td>`+ response[i].scan_time.masuk +`</td>
                            <td>`+ response[i].message[0][0] +`</td>
                            <td>`+ time_in +`</td>
                            <td>`+ response[i].scan_time.keluar +`</td>
                            <td>`+ response[i].message[0][1] +`</td>
                            <td>`+ time_out +`</td>
                            <td>`+ convertToTime(response[i].total_jam_kerja) +`</td>
                            <td>`+ response[i].rule.name +`</td>
                            </tr>
                            `;
                        }
                }

                    $("#listEmployees").html(html)
                    $('[data-toggle="datatable"]').DataTable({
                        pageLength: 31,
                        responsive: !0,
                        autoFill: !0,
                        keys: !0,
                        lengthMenu: [ [ 31, 50, 100, -1 ], [ 31, 50, 100, 'All' ] ],
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