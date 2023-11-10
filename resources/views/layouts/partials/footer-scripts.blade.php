<!-- Core JS -->

<!-- build:js assets/vendor/js/core.js -->
<script src="{{ url('/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ url('/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ url('/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ url('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ url('/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ url('/assets/js/dashboards-analytics.js') }}"></script>

<!-- Data Table JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Dropify JS -->
<script src="{{ url('/assets/vendor/libs/dropify-master/dist/js/dropify.min.js') }}"></script>

<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('body').on('click', '.btn-delete', function() {
        const title = $(this).data('confirm-title') || "Are you sure?";
        const text = $(this).data('confirm-text') || "Are you sure you want to delete this data?";
        const icon = $(this).data('confirm-icon') || "warning";
        const action = $(this).data('action');

        if (!action) {
            return;
        }

        swal({
            title,
            text,
            icon,
            buttons: [
                "Cancel",
                "Yes, Do It"
            ]
        }).then(function(willDelete) {
            if (willDelete) {
                const form = $(`<form action="${action}" method="POST">
                    @csrf
                    @method('delete')
                </form>`);
                $('body').append(form);
                form.submit();
            }
        });
    });
</script>

<script>
    if ($('.datatable').length > 0) {
        // Append row on thead for place search box
        $('table.datatable:not(.noinit):not(.no-init):not(.nofilter) thead tr')
            .clone(true)
            .appendTo('table.datatable:not(.noinit) thead');

        // Add a search box in thead, to search by individual column
        $('table.datatable thead tr:eq(1) th').each(function(i) {
            let title = $(this).text();
            if ($(this).attr('datatable-skip-search')) {
                return;
            }

            if (title && !['No', 'Actions'].includes(title)) {
                $(this).html(
                    '<input type="text" class="form-control form-control-sm" placeholder="&#x1F50D;" style="min-width:100px">'
                );
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table.column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            } else {
                $(this).html('');
            }
        });

        const dtLang = {
            config: {
                "sEmptyTable": "No data available in the table",
                "sProcessing": "Processing...",
                "sLengthMenu": "&nbsp;_MENU_",
                "sLoadingRecords": '<i class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only">Loading</span> Loading...',
                "sZeroRecords": "No matching records found",
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
                "sInfoEmpty": "Showing 0 to 0 of 0 entries",
                "sInfoFiltered": "(filtered from _MAX_ total entries)",
                "sInfoPostFix": "",
                "sSearch": "Search:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "First",
                    "sPrevious": "Previous",
                    "sNext": "Next",
                    "sLast": "Last"
                }
            },
            menu: {
                entries: "entries",
                allEntries: "All entries",
            }
        };


        const useKeyTable = $('.datatable.datatable-keytable').length > 0 || $('.datatable.datatable-scroll-x').length >
            0 ?
            true :
            false;

        let table = $('.datatable').DataTable({
            keys: useKeyTable,
            orderCellsTop: true,
            dom: '<"row"<"col-md-5 dt-feat-right"Bl><"col-md-7 dt-toolbar-right">>rtip',
            lengthMenu: [
                [25, 50, 100, -1],
                [`25 ${dtLang.menu.entries}`, `50 ${dtLang.menu.entries}`, `100 ${dtLang.menu.entries}`,
                    dtLang.menu.allEntries
                ]
            ],
            oLanguage: dtLang.config,
        });
    }
</script>
