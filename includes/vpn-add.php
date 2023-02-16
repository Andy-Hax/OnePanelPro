<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Add VPN</h6>
					</div>

				</div>
			</div>
			<div class="card-body px-0 pb-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-12">
							<div class="card card-plain">
								<div class="card-body">
									<form action="action.php" method="post" role="form" enctype="multipart/form-data">
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Location</label>

											<input name="location" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Enter URL or upload file?</label>
											<select id="ovpnType" class="form-control" onchange="toggleOvpnType(this)">
												<option value="path" selected>Enter an OVPN file URL</option>
												<option value="file">Upload an OVPN file</option>
											</select>
										</div>
										<div id="ovpnFileUpload" class="input-group input-group-outline mb-3 is-filled" style="display:none">
											<label class="form-label">OVPN File</label>
											<input name="ovpnfile" type="file" class="form-control">
										</div>
										<div id="ovpnPathEntry" class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">OVPN Path</label>
											<input name="ovpnpath" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Auth Type</label>
											<select name="authtype" class="form-control">

												<option value="noup">Username and Password not required</option>
												<option value="up">Username and Password</option>
												<option value="kp">Key file password</option>
											</select>
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Username</label>
											<input name="username" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Password</label>
											<input name="password" type="text" class="form-control" value="">
										</div>
										<div class="form-check form-switch d-flex align-items-center mb-3">
											<input class="form-check-input" type="checkbox" id="authembedded" name="authembedded">
											<label class="form-check-label mb-0 ms-3" for="authembedded">Is Auth Embedded?</label>
										</div>
										<div class="text-center">
											<button name="addvpn" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
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