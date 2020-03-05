<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
		let base_url = 'http://localhost:3002/'
        $(document).ready(function(){
            $.ajax({
                url: base_url + "attandances",
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
                            <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . ":5000/laporan.php?employeeid=" ?>`+ response[i].id +`">Lihat laporan</a>
                        </td>
                        </tr>
                        `;
                    }

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
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Role</td>
                <td>Laporan</td>
            </tr>
        </thead>
        <tbody id="list">

        </tbody>
    </table>
</body>
</html>