@include('navbar')

<main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Simple Tables</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Simple Tables
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
     
            <div class="app-content">
                <div class="container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Condensed Full Width Tables</h3>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Task</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Update software</td>
                                                <td><span class="badge text-bg-danger">55%</span></td>                       
                                            </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td>Update software</td>
                                                <td><span class="badge text-bg-danger">55%</span></td>                       
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                   
        </main>




@include('footer')
