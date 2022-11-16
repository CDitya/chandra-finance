// Beranda
function cekKelayakan() {
	$('#hasilLayak').empty();
	const keyword = $('#keywordCariLayak');
	$.ajax({
		url: 'beranda/getstatusdebitur',
		method: 'post',
		dataType: 'json',
		data: {keyword: keyword.val()},
		success: hasil => {
			elemenLayak(hasil);
		}
	});
	keyword.empty();
}
function elemenLayak(hasil) {
	if(hasil) {
		$('#hasilLayak').html(adaDataHTML(hasil));
	} else {
		$('#hasilLayak').html(noDataHTML());
	}
}
function adaDataHTML(hasil) {
	return `<div class="alert alert-secondary col-md-6 pt-4" role="alert">
		<p>
			${(hasil.status == 'Layak')? 'Selamat' : 'Maaf,'} Anda dinyatakan 
			<span class="font-weight-bold">
				${(hasil.status == 'Layak')? 'Layak' : 'Tidak Layak'}
			</span>
		</p>
	</div>`;
}
function noDataHTML() {
	return `<div class="alert alert-danger col-md-6 pt-4" role="alert">
		<p class="font-weight-bold">Data tidak dapat ditemukan!</p>
	</div>`;
}
$('#btnCariLayak').on('click', () => {
	cekKelayakan();
});
$('#keywordCariLayak').on('keyup', e => {
	if(e.which === 13) {
		cekKelayakan();
	}
})

// Input gambar
$('.custom-file-input').on('change', function() {
	let filename = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(filename);
});