@include('navbar')
 <!-- jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <!-- DataTables JavaScript -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <!-- DataTables Buttons CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <!-- DataTables Buttons JavaScript -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tbl').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'excelHtml5',
        'pdfHtml5',
        'print'
      ]
    });
  });
</script>
<main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Election Result</h3>
                        </div>
                        <div class="col-sm-6">
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                            <div class="card p-4">
                                <div class="card-body p-0">
                                <table id="tbl" class="table">
                                        <thead>
                                            <tr>
                                            <th>Partylist</th>
                                                <th>Position</th>
                                                <th>Full Name</th>
                                                <th>Age</th>
                                                <th>Year/Level</th>
                                                <th>Course</th>
                                                <th>Vote Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($candidates as $data): ?>
                                            <tr>
                                                <td>{{$data['par_name']}}</td>
                                                <td>{{$data['po_name']}}</td>
                                                <td>{{$data['c_name']}}</td>
                                                <td>{{$data['c_age']}}</td>  
                                                <td>{{$data['c_yearlevel']}}</td>
                                                <td>{{$data['c_course']}}</td>
                                                <td>{{$data['vote_count']}}</td>                                       
                                            </tr>
                                             <?php endforeach; ?>      
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>


@include('footer')
