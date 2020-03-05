<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.js"></script>
    <script>
        let base_url = 'http://localhost:3002/'
        
        function convertToTime(sec){
            var date = new Date(0);
            date.setSeconds(Math.abs(sec)); // specify value for SECONDS here
            var timeString = date.toISOString().substr(11, 8);
            console.log(timeString)
        }

        function convertToTime(sec)
{ // day, h, m and s
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
            $.ajax({
                url: base_url + "attandances/<?= $_GET['employeeid'] ?>/employeeid",
                type: 'GET',
                dataType: 'json',
                cache: false,
                beforeSend: function() {},
                success: function(response) {
                    var html = '';
                    for (let i = 0; i < response.length; i++) {
                        if(Array.isArray(response[i])){
                            html += `
                            <tr>
                                <td>`+ parseInt(i+1) +`</td>
                                <td colspan="9">Libur</td>
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
                    // $("h2").text(response.employee.fullname)
                    // $("font").text(response.employee.role.name)
                    $("#list").html(html)
                },
                error: function(response, textStatus, errorThrown) {
                    console.log('error')
                },
                complete: function() {
                    console.log('complete')
                }
            });
        })
        
    </script>
</head>
<body>
    <h2></h2>
    <font></font>
    <table class="table" border="1" width="100%">
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
        <tbody id="list">

        </tbody>
    </table>
</body>
</html>