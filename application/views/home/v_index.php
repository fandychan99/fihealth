<div class="row">
    <div class="col-12 col-lg-7">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <img src="<?= base_url() ?>assets/images/dashboard.png" alt="" class="form-control">
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <!-- <div class="col-12"> -->
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body ms-auto">
                <h4 id="jam"><?= date("l, d M Y H:i:s"); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="container py-2">
    <!-- timeline item 1 -->
    <div class="row">
        <!-- timeline item 1 left dot -->
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge rounded-pill bg-light border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <!-- timeline item 1 event content -->
        <div class="col py-2">
            <div class="card radius-15">
                <div class="card-body">
                    <h4 class="card-title text-muted">WHY FiHealth</h4>
                    <p class="card-text">
                    <ul>
                        <li>Enable healthcare providers to stay connected with their patients & manage their practice online</li>
                        <li>Help patients to collaborate in their own healthcare and access their own health data</li>
                        <li>Put patient health data at the center of chronic care management</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- timeline item 2 -->
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge rounded-pill bg-light border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card border-primary shadow radius-15">
                <div class="card-body">
                    <h4 class="card-title">How We built a digital health platform to connect doctors and their patients</h4>
                    <p class="card-text">The platform supports the goal of FiHealt for health by providing healthcare providers with a Virtual Practice that enables them to be securely accessible to their patients, through web and mobile services enabling online consultations and remote patient monitoring. The Virtual Practice also supports essential practice management functions and an online presence management for better patient engagement.</p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- timeline item 3 -->
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge rounded-pill bg-light border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card radius-15">
                <div class="card-body">

                    <h4 class="card-title">WHY Patients and Healthcare Providers Need This Because...</h4>
                    <p>
                    <ul>
                        <li>Healthcare providers need to be more accessible to their patients but in a manageble way that does not disrupt their hospital hours or personal time.</li>
                        <li>Variations in health conditions go unnoticed in between hospital visits.</li>
                        <li>Staying on track with one's medication and changes to diet and routine isn't easy.</li>
                        <li>Patients have healthcare needs that extend way beyond a visit to the clinic or hospital.</li>
                        <li>Required healthcare expertise is not always locally available</li>
                        <li>Also the increasing numbers of patients with chronic conditions require doctors to establish efficient, convenient and responsive ways of supporting chronic patients.</li>
                    </ul>
                    </p>

                    <p>Technology Can Help but patients need real healthcare providers</p>
                    <p>While patients are increasing using health sensors, connecting with their doctors and other patients on social media and searching for information online, it is very important to understand that</p>
                    <ul>
                        <li>Its difficult and risky to interpret one's own health data without a real healthcare provider</li>
                        <li>It takes a proper understanding of a patient's personalized needs to diagnose and treat an illness</li>
                        <li>Social networks and messaging apps are not the right places to be discussing health issues</li>
                    </ul>

                    <p>And this is why the best way to meet the needs of patients and healthcare providers is enable them to securely connect and engage with each other, with proper access to health data.</p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- timeline item 4 -->
    <div class="row">
        <div class="col-auto text-center flex-column d-none d-sm-flex">
            <div class="row h-50">
                <div class="col border-end">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
            <h5 class="m-2">
                <span class="badge rounded-pill bg-light border">&nbsp;</span>
            </h5>
            <div class="row h-50">
                <div class="col">&nbsp;</div>
                <div class="col">&nbsp;</div>
            </div>
        </div>
        <div class="col py-2">
            <div class="card radius-15">
                <div class="card-body">
                    <h4 class="card-title">Who People on a Mission</h4>
                    <p>The ContinuousCare platform has been built by a dedicated team at NeedStreet committed to changing the way healthcare is delivered and accessed. Founded in 2011, NeedStreet is backed by a team who have been working together for over 18 years building innovative technology solutions in different domains. We have lovingly built this product to help both healthcare providers and their patients and are working hard every day to make it better and more useful to it's users. Our team is based in the beautiful, green environs of Technopark, Trivandrum.</p>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
</div>

<script>
    // setInterval(function() {
    //     console.log("ini jam : <?= date("l, d M Y H:i:s"); ?>");
    //     $("#jam").val("<?= date("l, d M Y H:i:s"); ?>");
    // }, 1000);

    function updateClock() {
        var currentTime = new Date(); // Create a new Date object

        var day = currentTime.getDate(); // Get the day (1-31)
        var month = currentTime.getMonth() + 1; // Get the month (0-11). Add 1 because months are zero-based.
        var year = currentTime.getFullYear(); // Get the four-digit year
        var hours = currentTime.getHours(); // Get the hours
        var minutes = currentTime.getMinutes(); // Get the minutes
        var seconds = currentTime.getSeconds(); // Get the seconds

        var hari = currentTime.toLocaleString('en-US', { weekday: 'long' });

        // Add leading zeros to single-digit numbers
        day = (day < 10 ? "0" : "") + day;
        month = (month < 10 ? "0" : "") + month;
        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        // Display the complete time
        var datetime = hari + ", " + day + "/" + month + "/" + year + " " + hours + ":" + minutes + ":" + seconds;

        var clockElement = document.getElementById("jam");
        clockElement.innerHTML = datetime;
    }

    // Update the time every second (1000 milliseconds)
    setInterval(updateClock, 1000);
</script>