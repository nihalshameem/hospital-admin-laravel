@if(!empty(config('dz.public.global.js')))
	@foreach(config('dz.public.global.js') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
@if(!empty(config('dz.public.pagelevel.js.'.$action ?? '' ?? '' ?? '')))
	@foreach(config('dz.public.pagelevel.js.'.$action ?? '' ?? '' ?? '') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
<script src='https://code.jquery.com/jquery-1.12.3.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<style>
    
.dt-button.buttons-html5 {
    background: #d7dcd86b;
    border-color: #4ebd4b;
    padding: 6px 2.5rem;
    border-radius: 9.75rem;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.5rem !important;
    display: inline-block;
}
</style>
<script>
   if (jQuery("#report-mother-phc-table-excel").length > 0) {
            var table = $("#report-mother-phc-table-excel").DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,
                lengthChange: false,
                processing: true,
                serverSide: true,
                ajax: window.location.href,
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    },
                    {
                        data: "hsc_name",
                        name: "hsc_name",
                    },
                    {
                        data: "rch_id",
                        name: "rch_id",
                    },
                    {
                        data: "an_mother",
                        name: "an_mother",
                    },
                    {
                        data: "husband_name",
                        name: "husband_name",
                    },
                    {
                        data: "mobile",
                        name: "mobile",
                    },
                    {
                        data: "last_col",
                        name: "last_col",
                    },
                    {
                        data: "view",
                        name: "view",
                        orderable: false,
                        searchable: false,
                    },
                ],
                dom: 'Bfrtip',
        		buttons: [{
                        extend: 'excelHtml5'           
                    } 
        		]
            });
        }
   if (jQuery("#report-high-risk-phc-table-excel").length > 0) {
            var table = $("#report-high-risk-phc-table-excel").DataTable({
                searching: false,
                paging: true,
                select: false,
                //info: false,
                lengthChange: false,
                processing: true,
                serverSide: true,
                ajax: window.location.href,
                columns: [
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                    },
                    {
                        data: "hsc_name",
                        name: "hsc_name",
                    },
                    {
                        data: "rch_id",
                        name: "rch_id",
                    },
                    {
                        data: "an_mother",
                        name: "an_mother",
                    },
                    {
                        data: "husband_name",
                        name: "husband_name",
                    },
                    {
                        data: "mobile",
                        name: "mobile",
                    },
                    {
                        data: "gravida_para",
                        name: "gravida_para",
                    },
                    {
                        data: "lmp_date",
                        name: "lmp_date",
                    },
                    {
                        data: "edd_date",
                        name: "edd_date",
                    },
                    {
                        data: "reg_date",
                        name: "reg_date",
                    },
                    {
                        data: "high_risk",
                        name: "high_risk",
                    },
                    {
                        data: "view",
                        name: "view",
                        orderable: false,
                        searchable: false,
                    },
                ],
                dom: 'Bfrtip',
        		buttons: [{
                        extend: 'excelHtml5'           
                    } 
        		]
            });
        }
        
        $("#mother_visit_search_form").submit((e) => {
        e.preventDefault();
        $("#mother_visit_search_table").DataTable().destroy();
        mother_visit_search_form();
    });
    function mother_visit_search_form() {
        var values = {};
        var searchTable = $("#mother_visit_search_table");
        $.each($("#mother_visit_search_form").serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });
        if (jQuery("#mother_visit_search_table").length > 0) {
            searchTable.DataTable({
                searching: false,
                paging: false,
                select: false,
                //info: false,
                lengthChange: false,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `${window.location.href}/result`,
                    data: values,
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                    },
                    {
                        data: "visit_count",
                        name: "visit_count",
                    },
                    {
                        data: "remark",
                        name: "remark",
                    },
                    {
                        data: "an_mother_weight",
                        name: "an_mother_weight",
                    },
                    {
                        data: "bp",
                        name: "bp",
                    },
                    {
                        data: "hb",
                        name: "hb",
                    },
                    {
                        data: "high_risk_other",
                        name: "high_risk_other",
                    },
                    {
                        data: "scan_edd",
                        name: "scan_edd",
                    },
                    {
                        data: "efw",
                        name: "efw",
                    },
                    {
                        data: "bpd",
                        name: "bpd",
                    },
                    {
                        data: "afi",
                        name: "afi",
                    },
                    {
                        data: "crl",
                        name: "crl",
                    },
                    {
                        data: "placemental_position",
                        name: "placemental_position",
                    },
                    {
                        data: "gestational_age",
                        name: "gestational_age",
                    },
                    {
                        data: "action",
                        name: "Action",
                        orderable: false,
                        searchable: false,
                    },
                ],
                dom: 'Bfrtip',
        		buttons: [{
                        extend: 'excelHtml5'           
                    } 
        		]
            });
        }
    }

    jQuery(window).on("load", function () {
        if (jQuery("#mother_visit_search_table").length > 0) {
            jQuery("#mother_visit_search_table").destroy();
        }
    });
</script>
	<!--		<script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>
			<script src="{{ asset('js/deznav-init.js') }}" type="text/javascript"></script> -->
<!--	{{-- Education Theme JS --}}
 @if(!empty(config('dz.public.education.pagelevel.js.'.$action ?? '' ?? '' ?? '')))
	@foreach(config('dz.public.education.pagelevel.js.'.$action ?? '' ?? '' ?? '') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif	-->