<?php include("includes/header.php") ?>
<style>
    .services::-webkit-scrollbar{
        display:none
    }
    .services:hover::-webkit-scrollbar{
        display:block;
        width:8px;
    }
    .services::-webkit-scrollbar-track{
        border:1px solid #0b5345;
        border-radius:8px;
    }
    .services::-webkit-scrollbar-thumb{
        background:#0b5345;
        border-radius:8px;
    }
    .list-group-item.selected {
        background-color: #f0f8ff !important; /* Example background */
        border-left: 4px solid #007bff;
    }
</style>
<?php
if (isset($_GET['serv'])) {
    $id = $_GET['serv'];
    $query = mysqli_query($con, "SELECT * FROM `services` WHERE `id`='$id'");
    $row = mysqli_fetch_assoc($query);
    $date = $row['date'];
    $time = $row['start_time'];
    $newDate = date("d, M Y", strtotime($date));
    $newTime = date("h:i A", strtotime($time));
} else {
    $current = ("d, M Y");
    $tim = ("h:i A");
    $query = mysqli_query($con, "SELECT * FROM `services` ORDER BY `date`, `start_time` LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    $date = $row['date'];
    $time = $row['start_time'];
    $newDate = date("d, M Y", strtotime($date));
    $newTime = date("h:i A", strtotime($time));
}
?>
<div class="row" style="--bs-gutter-x: none;margin-right:calc(.5* var(--bs-gutter-x));margin-left:calc(.5* var(--bs-gutter-x));overflow:hidden">
    <div class="col-md-9">
        <div class="count-down" id="countdown" style="display:flex;flex-direction: column;margin:auto;align-items:center;justify-content:center;width:100%;height:540px;background:black">
            <p class="text-light">Next Service | <?= $row['title'] ?></p>
            <h5 id="countdown-date" class="text-light event"><?= $newDate ?>, <?= $newTime ?></h5>
            <div class="row">
                <div class="col-md-3 bg-secondary text-light rounded text-center" style="width:90px;margin-right:5px">
                    <h3 id="hours" class="fw-bold" style="margin-bottom:-3px">00</h3>
                    <p style="font-size:14px">HOURS</p>
                </div>
                <div class="col-md-3 bg-secondary text-light rounded text-center" style="width:90px;margin-right:5px">
                    <h3 id="minutes" class="fw-bold" style="margin-bottom:-3px">00</h3>
                    <p style="font-size:14px">MINUTES</p>
                </div>
                <div class="col-md-3 bg-secondary text-light rounded text-center" style="width:90px;margin-right:5px">
                    <h3 id="seconds" class="fw-bold" style="margin-bottom:-3px">00</h3>
                    <p style="font-size:14px">SECONDS</p>
                </div>
            </div>
        </div>
        <video src="videos&images/v1.mp4" id="video-slider" autoplay muted controls style="width:100%;height:540px; display:none;"></video>
    </div>
    <div class="col-md-3 text-center bg-light">
        <h4>Weekly Programs</h4>
        <hr>
        <div class="card services" style="border:none;height:438px;overflow:hidden;overflow-y:scroll">
            <?php 
               foreach($services as $service) : $id = $service['id'];
               $date = $service['date'];
               $time = $service['start_time'];
               $newDate = date("d, M Y", strtotime($date));
               $newTime = date("h:i A", strtotime($time));
            ?>
            <a href="services.php?serv=<?= $id ?>" class="list-group-item d-flex justify-content-between align-items-start mt-3" 
                style="border-bottom:2px solid grey"
                data-date="<?= $newDate ?>" data-time="<?= $newTime ?>">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?= $newDate ?></div>
                    <?= $service['title'] ?>
                </div>
                <span class="badge text-bg-primary rounded-pill"><?= $newTime ?></span>
            </a>
            <?php endforeach; ?>
        </div>
        <button style="font-size:13px;background:#6e2c00" class="btn btn-sm mt-2 text-light" data-bs-toggle="modal" data-bs-target="#prayer">Prayer request</button>
        <button style="font-size:13px;background:#1b2631" class="btn btn-sm mt-2 text-light" data-bs-toggle="modal" data-bs-target="#special">Special Consul</button>
        <button style="font-size:13px;background:#0b5345" class="btn btn-sm mt-2 text-light" data-bs-toggle="modal" data-bs-target="#comment">Comment</button>
    </div>
</div>
<script>
    const eventDates = Array.from(document.querySelectorAll(".event")).map(el => new Date(el.innerText));
    const eventItems = document.querySelectorAll(".list-group-item");
    let currentEventIndex = 0;

    const countdownDiv = document.getElementById("countdown");
    const videoElement = document.getElementById("video-slider");
    const countdownDateText = document.getElementById("countdown-date").innerText;

    eventItems.forEach(item => {
        const itemDate = item.getAttribute("data-date");
        const itemTime = item.getAttribute("data-time");
        
        // Check if countdown date matches the event item's date and time
        if (`${itemDate}, ${itemTime}` === countdownDateText.trim()) {
            item.classList.add("selected");
        }
    });

    function updateCountdown() {
        const now = new Date();
        const targetDate = eventDates[currentEventIndex];
        const difference = targetDate - now;

        if (difference > 0) {
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
        } else {
            clearInterval(countdownInterval);
            countdownDiv.style.display = "none";  // Hide countdown
            videoElement.style.display = "block"; // Show video
            videoElement.play();
        }
    }

    // Event listener for video ending
    videoElement.addEventListener("ended", function() {
        if (currentEventIndex < eventDates.length - 1) {
            currentEventIndex++;
            countdownDiv.style.display = "flex"; // Show countdown
            videoElement.style.display = "none"; // Hide video
            countdownInterval = setInterval(updateCountdown, 1000); // Restart countdown
        }
    });

    // Start initial countdown
    let countdownInterval = setInterval(updateCountdown, 1000);
</script>



<?php include("includes/footer.php") ?>