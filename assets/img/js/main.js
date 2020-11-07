$(document).ready(function(){
    $('#kendaraan').DataTable();
});

$(document).ready(function(){
    $('#status').DataTable();
});

$(document).ready(function(){
    $('#user').DataTable();
});

$(document).ready(function(){
    $('#penyewa').DataTable();
});

$(document).ready(function(){
    $('#maintenance').DataTable();
});

$(document).ready(function(){
    $('#requestsewa').DataTable();
});

$(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#sewa").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#sewa_filter input')
                        .off('.DT')
                        .on('keyup.DT', function(e) {
                            if (e.keyCode == 13) {
                                api.search(this.value).draw();
                    }
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
              "url": "kelola_sewa/json", 
              "type": "POST"
            },
            columns: [
                {
                    "data": "id",
                    "orderable": false
                },
                {"data": "nm_penyewa"},
                {
                	"data": null,
                	"mRender" :function(data,type,full){
                		return full['nm_kendaraan']+' '+full['jns_kendaraan'];
                	}
                },
                {"data": "tgl_awal"},
                {"data": "tgl_akhir"},
                {"data": "renc_pemakaian"},
                {"data": "jns_pekerjaan"},
                {"data": "pendanaan"},
                {"data": "action"}
            ],
            order: [[1, 'asc']],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
