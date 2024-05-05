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
            <span id = "student-desktop" ><?php echo session('name'); ?></span>
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



        <?php foreach($positions as $pos): ?>
    <!--DITO ILALAGAY YUNG PARA SA <?= $pos['po_name'];?> -->
    <div class="candidate-list bg-body-tertiary">
        <div class="candidate-item">
            <h5><?= $pos['po_name'];?> Max Vote:<?= $pos['po_max_vote'];?></h5>
            <form>
                <?php foreach($candidates as $candidate): ?>
                    <?php if($candidate['c_position'] == $pos['po_id']): ?>
                        <div class="candidate form-check">
                            <input class="form-check-input" type="checkbox" name="votestraight<?= $pos['po_id']; ?>[]" id="votestraight<?= $candidate['c_id']; ?>" onchange="limitCheckboxes(this, <?= $pos['po_max_vote']; ?>)">
                            <label class="candidate-label form-check-label" for="votestraight<?= $candidate['c_id']; ?>">
                                <img src="resources/images/school-logo.png" alt="Voting System">
                                <p><?= $candidate['c_name']; ?></p>
                                <div class="candidate-details">
                                    <p>Party List: <?= $candidate['par_name']; ?></p>
                                    <p>Age: <?= $candidate['c_age']; ?></p>
                                    <p>Year Level: <?= $candidate['c_yearlevel']; ?></p>
                                    <p>Course: <?= $candidate['c_course']; ?></p>
                                </div>
                            </label>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
    <!--END-->
<?php endforeach; ?>

<script>
    function limitCheckboxes(checkbox, max) {
        var checkboxes = document.getElementsByName(checkbox.name);
        var checkedCount = 0;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedCount++;
            }
        }
        if (checkedCount > max) {
            checkbox.checked = false;
        }
    }
</script>




   

        <!--THEN LAHAT NA NG NATIRANG CANDIDATE-->


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