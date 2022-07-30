//event pada saat link di klik
$('.page-scroll').on('clik', function(e) {

	//ambil isi href
	var tujuan = $(this).attr('href');
	// tangkap elemen bersangkutan
	var elemenHref = $(tujuan);
	
	// pindahkan scroll
	$('body').scrollTop('0');
	

	e.preventDefault();
});