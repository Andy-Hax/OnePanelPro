<div class="row mb-4">
    <div class="col-lg-12 col-md-12 mb-md-0">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>LTQ Deluxe App Settings</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-12">
                            <div class="card card-plain">
                                <div class="card-body">
                                    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg" style=" align-items: center;justify-content: center;">
                                        <div class="d-flex flex-column">
                                            <span style="vertical-align:middle;"><i class="material-icons opacity-10" style="font-size:40px;vertical-align:middle;">info</i>&nbsp;APK should be modified to point to <?php echo $GLOBALS['panelroot']; ?>LTQD/</span>
                                        </div>
                                    </div>
                                    <form action="action.php" method="post" role="form">
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Logo URL (Should be square PNG with transparent background)</label>
                                            <input name="logo" type="text" class="form-control" value="<?php echo $ltqdInfo['logo'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Intro Video URL</label>
                                            <input name="intro_video" type="text" class="form-control" value="<?php echo $ltqdInfo['intro_video'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Registration URL</label>
                                            <input name="registration_link" type="text" class="form-control" value="<?php echo $ltqdInfo['registration_link'] ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Welcome Message</label>
                                            <input name="welcome_message" type="text" class="form-control" value="<?php echo $ltqdInfo['welcome_message'] ?>">
                                        </div>
                                        <hr />
                                        <div class="text-center">
                                            <button name="updateltqd" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>