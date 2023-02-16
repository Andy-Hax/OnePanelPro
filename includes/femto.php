<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Femto Player Settings</h6>
					</div>
					<?php
					$showLiveChecked = "";
					$showSeriesChecked = "";
					$showVODChecked = "";
					$showEPGChecked = "";
					$showContentUpdateChecked = "";
					$proxyTrafficChecked = "";
					if ($femtoOptions['showLive'] == "1") {
						$showLiveChecked = "checked";
					}
					if ($femtoOptions['showSeries'] == "1") {
						$showSeriesChecked = "checked";
					}
					if ($femtoOptions['showVOD'] == "1") {
						$showVODChecked = "checked";
					}
					if ($femtoOptions['showEPG'] == "1") {
						$showEPGChecked = "checked";
					}
					if ($femtoOptions['showContentUpdate'] == "1") {
						$showContentUpdateChecked = "checked";
					}
					if ($femtoOptions['proxyTraffic'] == "1") {
						$proxyTrafficChecked = "checked";
					}

					?>
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
											<span style="vertical-align:middle;"><i class="material-icons opacity-10" style="font-size:40px;vertical-align:middle;">info</i>&nbsp;APK should be modified to point to <?php echo $GLOBALS['panelroot']; ?>femto/</span>
										</div>
									</div>
									<form action="action.php" method="post" role="form">
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="showLive" name="showLive" <?php echo $showLiveChecked; ?>>
											<label class="form-check-label mb-0 ms-3" for="showLive">Show Live TV</label>
										</div>
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="showSeries" name="showSeries" <?php echo $showSeriesChecked; ?>>
											<label class="form-check-label mb-0 ms-3" for="showSeries">Show Series</label>
										</div>
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="showVOD" name="showVOD" <?php echo $showVODChecked; ?>>
											<label class="form-check-label mb-0 ms-3" for="showVOD">Show VOD</label>
										</div>
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="showEPG" name="showEPG" <?php echo $showEPGChecked; ?>>
											<label class="form-check-label mb-0 ms-3" for="showEPG">Show EPG</label>
										</div>
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="showContentUpdate" name="showContentUpdate" <?php echo $showContentUpdateChecked; ?>>
											<label class="form-check-label mb-0 ms-3" for="showContentUpdate">Show Content Update</label>
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">DNS Setting</label>
											<select class="form-control" id="proxyTraffic" name="proxyTraffic">
												<option value="0" <?php echo $femtoOptions['proxyTraffic'] == "0" ? "selected" : ""; ?>>Send DNS directly to app</option>
												<option value="1" <?php echo $femtoOptions['proxyTraffic'] == "1" ? "selected" : ""; ?>>Proxy DNS through panel</option>
											</select>
										</div>
										<h6>NOTE: Femto is single DNS only so only the first DNS will be sent, to make multi-DNS - select DNS forwarding or proxying above</h6>

										<div class="text-center">
											<button name="updatefemto" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
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