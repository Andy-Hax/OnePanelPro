<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>TiviMate Settings</h6>
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
											<span style="vertical-align:middle;"><i class="material-icons opacity-10" style="font-size:40px;vertical-align:middle;">info</i>&nbsp;APK should be modified to point to <?php echo $GLOBALS['panelroot']; ?>tivi/</span>
										</div>
									</div>
									<form action="action.php" method="post" role="form" enctype="multipart/form-data">
									<div class="input-group input-group-outline mb-3 is-filled">
  											<label class="form-label">DNS Setting</label>
  											<select class="form-control" id="proxyTraffic" name="proxyTraffic">
  												<option value="0" <?php echo $tiviInfo['proxyTraffic'] == "0" ? "selected" : ""; ?>>Send DNS directly to app</option>
  												<option value="1" <?php echo $tiviInfo['proxyTraffic'] == "1" ? "selected" : ""; ?>>Proxy DNS through panel</option>
  											</select>
  										</div>
										<h6>NOTE: TiviMate 3.x is single DNS only so only the first DNS willbe sent, to make multi-DNS - select DNS forwarding or proxying above</h6>
										<div class="text-center">
											<button name="updatetivi" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
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