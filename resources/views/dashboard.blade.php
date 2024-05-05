@include('navbar')
<script src="js/adminlte.js"></script>
    <script src="assets/chart/chart.min.js"></script>
<main class="app-main"><br>
              <!--begin::App Content-->
              <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 1-->
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3>{{$totalpos}}</h3>
                                    <p>No of Positions</p>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa-solid fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <!--end::Small Box Widget 1-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 2-->
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>{{$totalcandidates}}</h3>

                                    <p>No of Candidates</p>
                                </div>
                              
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa-solid fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <!--end::Small Box Widget 2-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 3-->
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>{{$totalvoters}}</h3>

                                    <p>Total Voters</p>
                                </div>
                              
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa-solid fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <!--end::Small Box Widget 3-->
                        </div>
                        <!--end::Col-->
                        <div class="col-lg-3 col-6">
                            <!--begin::Small Box Widget 4-->
                            <div class="small-box text-bg-danger">
                                <div class="inner">
                                    <h3>{{$totalvoted}}</h3>
                                    <p>Voter's Voted</p>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa-solid fa-arrow-circle-right"></i>
                                </a>
                            </div>
                            <!--end::Small Box Widget 4-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                
                   <h4> Votes Tally </h4>       
    <div class="row">
        @foreach($positionData as $position)
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">{{ $position['position_name'] }}</h6>
                <canvas id="{{ str_replace(' ', '_', strtolower($position['position_name'])) }}-bar-chart"></canvas>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        @foreach($positionData as $position)
        var {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_ctx = $("#{{ str_replace(' ', '_', strtolower($position['position_name'])) }}-bar-chart").get(0).getContext("2d");
        var {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_candidateData = @json($position['candidates']);

        var {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_candidateNames = {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_candidateData.map(function(item) {
            return item.name;
        });

        var {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_voteCounts = {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_candidateData.map(function(item) {
            return item.vote_count;
        });

        var {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_chart = new Chart({{ str_replace(' ', '_', strtolower($position['position_name'])) }}_ctx, {
            type: "bar",
            data: {
                labels: {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_candidateNames,
                datasets: [{
                    backgroundColor: [
                        "rgba(0, 156, 255, .7)",
                        "rgba(0, 156, 255, .6)",
                        "rgba(0, 156, 255, .5)",
                        "rgba(0, 156, 255, .4)",
                        "rgba(0, 156, 255, .3)"
                    ],
                    data: {{ str_replace(' ', '_', strtolower($position['position_name'])) }}_voteCounts
                }]
            },
            options: {
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
        });
        @endforeach
    </script>



                   
        </main>
       


@include('footer')


