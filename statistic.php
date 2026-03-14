<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
    <div class="ui container grid">
        <div class="row">
            <div class="fifteen wide computer sixteen wide phone centered column center-table">
                <div class="ui divider"></div>
                <div class="ui grid">
                    <div class="sixteen wide computer sixteen wide phone centered column">
                        <!-- BEGIN DATATABLE -->
                        <div class="ui stacked segment">
                            <div class="ui blue ribbon icon label">Detailed statistics</div>
                            <br><br>
                            <table id="example" class="ui celled table responsive nowrap unstackable"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Month</th>
                                        <th>Invoice Quantity</th>
                                        <th>Product quantity</th>
                                        <th>Profit</th>
                                        </th>
                                    </tr>
                                </thead>
                                <?php
                                    $monthly_stats = get_monthly_stats();
                                    $monthly_quantities = get_monthly_product_quantity();
                                    
                                    // Create arrays indexed by month
                                    $stats_by_month = [];
                                    foreach ($monthly_stats as $stat) {
                                        $stats_by_month[$stat['month']] = $stat;
                                    }
                                    
                                    $quantities_by_month = [];
                                    foreach ($monthly_quantities as $qty) {
                                        $quantities_by_month[$qty['month']] = $qty['total_quantity'];
                                    }
                                    
                                    for ($i = 1; $i <= 12; $i++) {
                                        $total_invoice = isset($stats_by_month[$i]) ? $stats_by_month[$i]['invoice_count'] : 0;
                                        $total_profit = isset($stats_by_month[$i]) ? $stats_by_month[$i]['total_profit'] : 0;
                                        $slsp = isset($quantities_by_month[$i]) ? $quantities_by_month[$i] : 0;
                                        
                                        echo '<tr>';
                                        echo '<td>' . $i . '</td>';
                                        if ($total_invoice == 0) {
                                            echo '<td> - </td>';
                                        } else {
                                            echo '<td>' . $total_invoice . '</td>';
                                        }
                                        if ($slsp == 0) {
                                            echo '<td> - </td>';
                                        } else {
                                            echo '<td>' . $slsp . '</td>';
                                        }
                                        if ($total_profit == 0) {
                                            echo '<td> - </td>';
                                        } else {
                                            echo '<td>' . number_format($total_profit) . '</td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                            </table>
                        </div>
                        <!-- END DATATABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

</div>
</body>
<!-- inject:js -->
<script src=" vendors/jquery/jquery.min.js">
</script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->
<!-- datatables:js -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net/datatables.net-se/js/dataTables.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive-se/js/responsive.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons-se/js/buttons.semanticui.min.js"></script>
<script src="vendors/jszip/jszip.min.js"></script>
<script src="vendors/pdfmake/pdfmake.min.js"></script>
<script src="vendors/pdfmake/vfs_fonts.js"></script>
<!-- endinject -->

<!-- <script>
$(document).ready(function() {

  $(document).ready(function() {
    $('#example').DataTable();
  });
  table.buttons().container().appendTo(
    $('div.eight.column:eq(0)', table.table().container())
  );
});
</script> -->

</html>