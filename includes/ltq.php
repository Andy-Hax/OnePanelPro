<div class="row mb-4">
    <div class="col-lg-12 col-md-12 mb-md-0">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>LTQ Player Settings</h6>
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
											<span style="vertical-align:middle;"><i class="material-icons opacity-10" style="font-size:40px;vertical-align:middle;">info</i>&nbsp;APK should be modified to point to <?php echo $GLOBALS['panelroot']; ?>ltq/</span>
										</div>
									</div>
                                    <form action="action.php" method="post" role="form" enctype="multipart/form-data">
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">DNS Setting</label>
                                            <select class="form-control" id="proxyTraffic" name="proxyTraffic">
                                                <option value="1" <?php echo $ltqInfo['proxyTraffic'] == "2" ? "selected" : ""; ?>>Proxy DNS through panel</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button name="updateltq" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
                                        </div>
                                    </form>
                                    <hr />
                                    <form action="action.php" method="post" role="form" enctype="multipart/form-data">
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">AES Encryption Key</label>
                                            <input name="ltq_key" type="text" class="form-control" value="<?php if (isset($_SESSION['ltq_key'])) {
                                                                                                                echo $_SESSION['ltq_key'];
                                                                                                            } else {
                                                                                                                echo 'yugofuckyourself';
                                                                                                            }; ?>">
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Enter</label>
                                            <textarea name="ltq_from" type="text" class="form-control"><?php if (isset($_SESSION['ltq_from'])) {
                                                                                                            echo $_SESSION['ltq_from'];
                                                                                                        } else {
                                                                                                            echo $GLOBALS['panelroot'] . "ltq/";
                                                                                                        }; ?></textarea>
                                        </div>
                                        <div class="input-group input-group-outline mb-3 is-filled">
                                            <label class="form-label">Result</label>
                                            <textarea name="ltq_to" type="text" class="form-control"><?php if (isset($_SESSION['ltq_to'])) {
                                                                                                            echo $_SESSION['ltq_to'];
                                                                                                        }; ?></textarea>
                                        </div>
                                        <?php unset($_SESSION['ltq_key']);
                                        unset($_SESSION['ltq_from']);
                                        unset($_SESSION['ltq_to']); ?>
                                        <div class="text-center">
                                            <button name="encryptltq" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Encrypt</button>
                                            <button name="decryptltq" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Decrypt</button>
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