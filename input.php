<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		let base_url = 'http://localhost:3002/'
		$(document).ready(function(){
			$("button").click(function(){
				var tanggal = new Date(2020, 1, 0).getDate()
				var date_array = []
				for (let i = 1; i < tanggal+1; i++) {
					var nol
					if (i < 10) {
						nol = "0" + i
					}else{
						nol = i
					}
					
					date_array.push("2020-01-"+ nol)
					
				}

				let data = []
				$('table tr').each(function() {
					var cellText = $(this).text();  
					data.push(cellText)
				});
				let data_one = []
				for (let i = 2; i < data.length; i++) {
					let dummy = data[i].replace(/(\r\n|\n|\r)/gm, ",")
					let dummy_2 = dummy.replace(/\s/g,'').split(',')
					let sub_data = []
					for (let j = 0; j < dummy_2.length; j++) {
						if (dummy_2[j] != "") {
							sub_data.push(dummy_2[j])
						}            
					}
					data_one.push(sub_data)
				}
				
				let key = []
				for (let i = 0; i < data_one.length; i++) {
					if (key.length > 0) {
						if(!key.includes(data_one[i][2])){
							key.push(data_one[i][2])
						}
					}else{
						key.push(data_one[i][2])
					}
				}
				
				let final_data = []
				let final = []
				for (let k = 0; k < key.length; k++) {
					let date = []
					for (let i = 0; i < data_one.length; i++) {
						if(data_one[i][2] == key[k]){
							for (let l = 0; l < date_array.length; l++) {
								let date_sub = []
								var tanggal = data_one[i][3];
								var tanggalbaru = tanggal.split("-").reverse().join("-");
								if(tanggalbaru == date_array[l]){
									for (let j = 4; j < data_one[i].length; j++) {
										date_sub.push({
											date: date_array[l],
											time: data_one[i][j]
										})
									}
									date[l] = date_sub
								}
							}
						}
					}
					final_data[k] = {
						name: key[k],
						scan: date
					};
				}
				
				$.ajax({
					url: base_url + "attandances",
					type: 'POST',
					data: {
						query: JSON.stringify(final_data)
					},
					dataType: 'json',
					async: true,
					cache: false,
					// dataType: 'json',
					beforeSend: function() {},
					success: function(response) {
						console.log('success')
					},
					error: function(response, textStatus, errorThrown) {
						console.log('error')
					},
					complete: function() {
						console.log('complete')
					}
				});
			});
		});
	</script>
</head>
<body>
	<button>get</button>
	<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=2 BGCOLOR=#C0C0C0>
		<TR VALIGN="TOP" class="Band" BGCOLOR=#F0FBFF>
			<TD NOWRAP COLSPAN=6 ALIGN="CENTER" HEIGHT=19>
				<B>Pegawai</B>
			</TD>
			<TD NOWRAP COLSPAN=9 ALIGN="CENTER" HEIGHT=19>
				<B>Data scanlog</B>
			</TD>
		</TR>
		<TR VALIGN="TOP" class="Header" BGCOLOR=#F0FBFF>
			<TD NOWRAP WIDTH=44 ALIGN="CENTER">PIN</TD>
			<TD NOWRAP WIDTH=44 ALIGN="CENTER">NIP</TD>
			<TD NOWRAP WIDTH=122 ALIGN="CENTER">Nama</TD>
			<TD NOWRAP WIDTH=61 ALIGN="CENTER">Jabatan</TD>
			<TD NOWRAP WIDTH=81 ALIGN="CENTER">Departemen</TD>
			<TD NOWRAP WIDTH=55 ALIGN="CENTER">Kantor</TD>
			<TD NOWRAP WIDTH=64 ALIGN="CENTER">Tanggal</TD>
			<TD NOWRAP WIDTH=69 ALIGN="CENTER">Scan 1</TD>
			<TD NOWRAP WIDTH=69 ALIGN="CENTER">Scan 2</TD>
			<TD NOWRAP WIDTH=69 ALIGN="CENTER">Scan 3</TD>
			<TD NOWRAP WIDTH=67 ALIGN="CENTER">Scan 4</TD>
			<TD NOWRAP WIDTH=67 ALIGN="CENTER">Scan 5</TD>
			<TD NOWRAP WIDTH=67 ALIGN="CENTER">Scan 6</TD>
			<TD NOWRAP WIDTH=67 ALIGN="CENTER">Scan 7</TD>
			<TD NOWRAP WIDTH=57 ALIGN="CENTER">Scan 8</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">01-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:26:37 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:33:59 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:13:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:39:48 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:29:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">02-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:25:00 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:32:09 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:36:45 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:10:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:45:57 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">03-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:07:15 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:34:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:56:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:30:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">04-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:37:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:05:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:30:17 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:21:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">05-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:36:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:56:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:50:26 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:16:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:03:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">06-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:41:12 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:53:06 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:05:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:27:55 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:10:12 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:30:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">07-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:37:20 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:27:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:50:49 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:02:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:18:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">09-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:36:40 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:11:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:39:17 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:49:46 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:04:50 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:23:10 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:04:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:21:31 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:47:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:51:59 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:48 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:28:09 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:12:01 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">12-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:35:07 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:38:08 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:05:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:32:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:16:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:33:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:38:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">13-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:32:09 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:33:05 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:54:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:21:47 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">15-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:35:49 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:49:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:30:04 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:55:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:19:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">16-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:40:36 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:58:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">12:07:43 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:08:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:10:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">17-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:11:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:33:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:53:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:13:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">18-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:37:07 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:49:45 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:17:26 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:21:12 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">19-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:35:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:57:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:34:52 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:53:24 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:04:57 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:57 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">20-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:45:23 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:09:29 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:35:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:13:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:17:32 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">21-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:38:52 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:30:53 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:13:20 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:05:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:14:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">23-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:37:44 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:12:58 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:35:50 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:10:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">24-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:11:10 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:36:27 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:56:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:19:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:00:21 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">25-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:44:07 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:06:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:30:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:12:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:26:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">26-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:42:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:07:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:27:07 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:13:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:30:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:36:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">27-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:45:00 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:04:21 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:54:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:22:49 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">28-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:39:50 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:42:04 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:06:31 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:17:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">30-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:42:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:07:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:01:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:07:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550109</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Kasir</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">31-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:08:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:35:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:01:20 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:14:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">01-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:47:45 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:06:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:47:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:01:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:09:19 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">03-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:51:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:04:17 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:32:10 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:05:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">04-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:51:22 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:30:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:18:47 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:21:27 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:06:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:11:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">05-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:51:35 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:52:36 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:31:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:21:11 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:03:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:05:26 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">06-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:50:29 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:53:25 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:07:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:45:07 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:19:32 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:22:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">07-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:51:36 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:30:21 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:22:15 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:01:52 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">08-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:48:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:05:29 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:33:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">09-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:46:18 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:03:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:57:16 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:03:49 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:07:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:49:25 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:43:55 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:38:09 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:10:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:16:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">14-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:49:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:14:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:42:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:09:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:15:01 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">15-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:50:57 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:30:20 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:20:05 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:23:54 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:00:16 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:01:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:44:52 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:01:53 PM</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">17-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:49:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:33:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:01:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">18-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:47:58 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:05:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:06:33 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:50:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:05:33 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">19-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:48:50 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:56:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:03:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:04:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:05:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:12:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">20-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:47:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:02:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:29:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:05:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:09:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">21-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:47:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:17 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:57:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">22-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:49:56 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:01:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:48:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:01:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">24-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:49:58 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:03:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:02:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:06:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">25-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:50:44 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:55:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:11:52 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:38:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:23:45 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">26-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:50:41 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:53:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:31:04 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:33:01 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:21:55 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:50:48 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:02:50 PM</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">27-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:52:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:38:40 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:58:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:53 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:15:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">28-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:49:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:51:56 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:01 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:49:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:02:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">29-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:50:19 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:31:11 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:19:47 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:01:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:04:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">30-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:47:25 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:31:28 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:19:01 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:03:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:51:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:01:32 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550215</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf OPP</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">31-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:50:43 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:45:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:12:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:15:07 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">01-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:26:51 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:10:10 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">8:33:30 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:11:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">02-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:29:05 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:32:23 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:48:00 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:13:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:16:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">03-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:30:40 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:31:09 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:07:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:09:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">04-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:21:32 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:42:34 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:52:38 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:10:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">05-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:30 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:33:55 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:34:45 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:52:42 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:11:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:14:32 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">06-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:27:27 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:29:35 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:16:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:26 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:04:20 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:30:50 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">08-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:30:35 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:09:51 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:46:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:49:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:12 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">12-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:25 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:13:45 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:36:58 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:02:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:11:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">14-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:57:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:37:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:58:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:09:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:43 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">15-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:29 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:12:27 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:14:04 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:44:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:04 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">16-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:01:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:02:43 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:16:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:35:15 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:03:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">17-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:09:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:47:15 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:11:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">18-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">1:28:49 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:17:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:36:26 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">19-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:24:45 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:23:06 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:39:19 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:32:17 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:36:40 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">21-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:00:58 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:14:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:39:45 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">22-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:25:24 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:27:40 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:00:45 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:02:07 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:40:06 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:12:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">23-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:08:24 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:44:33 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:08:43 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:02:19 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">24-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:12:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:14:33 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:39:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:02:54 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:04:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">25-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:04:17 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:10:40 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:32:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:36 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">26-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:32:04 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:27:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:39:36 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:28:21 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:39:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">28-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:04:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:09:16 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:03:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:31:37 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:45 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">29-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:22:51 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:53 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:43:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:06:59 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">30-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:01:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:40:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:56:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:10:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:06:05 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:19 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550325</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Produksi</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">31-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:02:28 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:39:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:01:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:27 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">01-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">7:50:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:48:53 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:01:44 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:17:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:45:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:04:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:54 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">02-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:03:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:04:08 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:33:24 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:07:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:15:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">03-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:05:16 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:13:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:42:29 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:06:04 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">04-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:50:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:40:30 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">6:07:16 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">05-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:51:25 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:12:31 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:58:10 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:02:53 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">06-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:48:23 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:11:19 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:53:02 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:10:39 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">07-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:42:53 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:18:48 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:53:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:06:14 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">09-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:10:48 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:14:54 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:44:20 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:06:10 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:45:35 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:46:14 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:32:00 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:01:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:16:07 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:56:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:21 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">12-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:43:53 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:49:40 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:12:18 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:54:17 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:00:52 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">13-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:45:40 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:12:15 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:14 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:13:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:16:05 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:35:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">17-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:03:09 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:36:57 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:05:13 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:12:03 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">18-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:40:09 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:18:03 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:43:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:45:33 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:29:55 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">19-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:05:25 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:03:34 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:33:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:32 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">20-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:52:22 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:10:43 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:48:23 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:07:55 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">21-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:49:37 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:12:30 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:56 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:24:01 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">23-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:02:11 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:04:44 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:11:35 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:38:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:06:24 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:05:00 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">24-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:50:32 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:07:11 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:44:57 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:50:46 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:48 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:30:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">25-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">10:53:51 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:25:04 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:25:02 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:10:22 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:21:31 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">26-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:42:16 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:45:47 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:26:11 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:11 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:08:46 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:24:38 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">27-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:03:42 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:27:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:01:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:30:19 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:08:41 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:11:51 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">28-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:43:12 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:04:38 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:49:29 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:05:30 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:31:56 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">30-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">2:00:23 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">4:40:29 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:10:44 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">11:13:54 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
		<TR>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">550446</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">Staf Prodksi Non Masak</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">31-01-2020</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">5:57:49 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:13:20 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">9:51:29 AM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">3:02:18 PM</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
			<TD NOWRAP ALIGN="LEFT" BGCOLOR=#FFFFFF>
				<FONT STYLE="font-family: Arial; font-size: 8pt; color: #000000">&nbsp;</FONT>
			</TD>
		</TR>
	</TABLE>
	
</body>
</html>
