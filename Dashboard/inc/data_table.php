<!--Basic Filter Options -->
<div class="container-fluid border bg-gradient-primary mb-3 pt-3 pb-3">
    <span class="lead text-white">Basic Details About Students</span>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STUDENT NUMBER</th>
                        <th>YEAR</th>
                        <th>DEPARTMENT</th>
                        <th>EMAIL</th>
                        <th>SEX</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STUDENT NUMBER</th>
                        <th>YEAR</th>
                        <th>DEPARTMENT</th>
                        <th>EMAIL</th>
                        <th>SEX</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="advanceModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>This is a large modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#advanceModal").modal();
</script>