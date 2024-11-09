<?php include("includes/header.php") ?>

<div class="container">
    <!-- --------------------------- featured events----------------------- -->
    <div class="events">
        <div class="events-header text-center">
            <h2>Upcoming Events.</h2>
        </div>
        <div class="container row mx-auto" id="card-container">
            <div class="col-md-4 mb-2 card-item">
                <div class="card shadow">
                    <img src="videos&images/1.jpg" class="card-img" style="height:225px;object-fit:cover">
                    <div class="card-img-overlay">
                        <h5 class="card-title btn fw-bold" style="background:#1abc9c;color:white">02, Oct 2024 | 6:00 PM</h5>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold" style="font-size:16px">Lorem, ipsum dolor sit amet</h5>
                        <p class="card-text" style="font-size:15px;margin-bottom:-3px"><i class="fas fa-map-marker" style="margin-right:10px;"></i> <b>Venue:</b> At Milele Hotel</p>
                        <button class="btn btn-info text-light mt-2"  style="position:relative" data-bs-toggle="modal" data-bs-target="#participate">Participate On</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2 card-item">
                <div class="card shadow">
                    <img src="videos&images/2.jpg" class="card-img" style="height:225px;object-fit:cover">
                    <div class="card-img-overlay">
                        <h5 class="card-title btn fw-bold" style="background:#1abc9c;color:white">02, Oct 2024 | 6:00 PM</h5>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold" style="font-size:16px">Lorem, ipsum dolor sit amet</h5>
                        <p class="card-text" style="font-size:15px;margin-bottom:-3px"><i class="fas fa-map-marker" style="margin-right:10px;"></i> <b>Venue:</b> At Milele Hotel</p>
                        <button class="btn btn-info text-light mt-2"  style="position:relative" data-bs-toggle="modal" data-bs-target="#participate">Participate On</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2 card-item">
                <div class="card shadow">
                    <img src="videos&images/3.jpg" class="card-img" style="height:225px;object-fit:cover">
                    <div class="card-img-overlay">
                        <h5 class="card-title btn fw-bold" style="background:#1abc9c;color:white">02, Oct 2024 | 6:00 PM</h5>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="fw-bold" style="font-size:16px">Lorem, ipsum dolor sit amet</h5>
                        <p class="card-text" style="font-size:15px;margin-bottom:-3px"><i class="fas fa-map-marker" style="margin-right:10px;"></i> <b>Venue:</b> At Milele Hotel</p>
                        <button class="btn btn-info text-light mt-2"  style="position:relative" data-bs-toggle="modal" data-bs-target="#participate">Participate On</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- ===================================== participate form =============================== -->
    <div class="modal fade" id="participate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="card-header text-center" style="margin-bottom:-10px">
                    <div class="row bg-light" style="--bs-gutter-x: none;margin-right:calc(.5* var(--bs-gutter-x));margin-left:calc(.5* var(--bs-gutter-x));">
                        <div class="col-md-6">
                            <img src="videos&images/1.jpg" style="height:150px;border-radius:10px">
                        </div>
                        <div class="col-md-6" style="display:flex;flex-direction: column;margin:auto;align-items:center;justify-content:center;">
                            <p class="">Lorem, ipsum dolor sit amet</p>
                            <p class="">02, Oct 2024 | 6:00 PM</p>
                            <p class="">At Milele Hotel</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal-body">
                    <form action="EditCode.php" method="POST" enctype="multipart/form-data">
                        <div class="row text-center">
                            <div class="col-md-12 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Your Name</label>
                                    <input type="text" name="usernameL" placeholder="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect02">Your Phone</label>
                                    <input type="phone" name="phone" placeholder="Phone" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="login" class="btn" style="background:#13372f;color:white">Send Request <i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php") ?>