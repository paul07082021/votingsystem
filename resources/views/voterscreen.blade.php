<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Voters Screen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/voterscreen.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src = "resources/images/school-logo.png" style = "height:70px;" /></a>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <span id = "student-desktop" >Student Name</span>
            <a class = "desktop btn" href = "#" class="navbar-text">SIGN OUT</a>
          </div>
          <span id = "student-mobile" >Student Name</span>
          <a class = "mobile btn" href = "#" class="navbar-text">SIGN OUT</a>
        </div>
      </nav>
    <div class ="voters container-fluid">
        <div class = "voters-header" >
            <h3>ELECTION TITLE</h3>
        </div>
        <div class = "vote-straight">
            <h6>VOTE STRAIGHT</h6>
            <form>
                <div class = "partylist">
                    <!--DITO ILALAGAY YUNG QUERY PARA SA PAG DISPLAY NG LAHAT NG PARTY LIST-->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="votestraight" id="votestraight1">
                        <label class="form-check-label" for="votestraight1">
                        PULANG ARAW
                        </label>
                    </div>
                    <!-- END -->

                </div>
                <div>
                    <button type = "submit" class = "btn btn-primary mt-1">SUBMIT</button>
                </div>
            </form>
        </div>
        <!--DITO ILALAGAY YUNG PARA SA PRESIDENT -->
        <div class = "candidate-list bg-body-tertiary">
            <div class = "candidate-item">     
            <h5>President</h5>


                <form>
                    <div class="candidate form-check">
                        <input class="form-check-input" type="radio" name="votestraight" id="votestraight3">
                        <label class="candidate-label form-check-label" for="votestraight3">
                        <img src="resources/images/school-logo.png" alt="Voting System">
                            <p>NICOLE MAMARIL</p>
                            <div class = "candidate-details">
                                <p>Party List: KVYO</p>
                                <p>Age: 22</p>
                                <p>Year Level: 4th</p>
                                <p>Course: BSCS</p>
                            </div>
                        </label>
                    </div>
                </form>

            
        </div>
        <!--END-->



        <div class ="for-view-button">
            <button type = "button" class = "btn btn-primary">SUBMIT</button>
            <button type = "button" class = "btn btn-success" data-bs-toggle="modal" data-bs-target="#viewModal">VIEW SUMMARY</button>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">CANDIDATES</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>
            <div class="modal-body">
            <p>PRESIDENT: ARROYO</p>
            <p>VICE PRESIDENT: TESTING</p>
            <p>SECRETARY: DUTERTE</p>
            <p>TREASURER: MARCOS</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-warning">CHANGE</button>
            <button type="button" class="btn btn-primary">SUBMIT</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>