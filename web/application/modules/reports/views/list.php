<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">

<div class="col-lg-12">
    <div class="example-box example-box-alt pb-5">
        <h4 class="heading-2 pb-4">Report Employee</h4>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-box mb-5">
                    <div class="card-body">
                    <table class="pure-table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Waktu</th>
            <th>Libur</th>
            <th>Lembur</th>
            <th>Terlambat</th>
            <th>Pulang Awal</th>
            <th>Izin</th>
            <th>Bolos</th>
            <th>Hari Kerja</th>
            <th>Briefing</th>
            <th>Ket</th>
        </tr>
    </thead>
    <tbody id="listReport">
        
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
    refreshReport()
})

    function refreshReport(){
        $.ajax({
                url: base_url + "reports",
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
                            <td>`+ response[i].employee.fullname +`</td>
                            <td>`+ response[i].employee.role.name +`</td>
                            <td>Bulan `+ response[i].month +`- `+ response[i].year +`</td>
                            <td>`+ response[i].libur +`</td>
                            <td>`+ response[i].lembur +`</td>
                            <td>`+ response[i].terlambat +`</td>
                            <td>`+ response[i].home_early +`</td>
                            <td>`+ response[i].izin +`</td>
                            <td>`+ response[i].bolos +`</td>
                            <td>`+ response[i].work_days +`</td>
                            <td>`+ response[i].friday_briefing +`</td>
                            <td>`+ response[i].desc +`</td>
                        </tr>
                        `;
                    }

                    $("#listReport").html(html)
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