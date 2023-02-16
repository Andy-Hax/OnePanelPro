<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Manage LTQD Sports Category</h6>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pb-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-12">
							<div class="card card-plain">
								<div class="card-body">
									<form action="action.php" method="post" role="form">
									<input name="id" type="hidden" value="<?php echo $ltqdAppstoreEditInfo['id'] ?>" />

									<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Name</label>
											<input name="name" type="text" class="form-control" value="<?php echo $ltqdAppstoreEditInfo['name'] ?>">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Package Name (e.g. com.qdeluxe.app)</label>
											<input name="package_name" type="text" class="form-control" value="<?php echo $ltqdAppstoreEditInfo['package_name'] ?>">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Download URL (APK)</label>
											<input name="install_url" type="text" class="form-control" value="<?php echo $ltqdAppstoreEditInfo['install_url'] ?>">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Description</label>
											<input name="description" type="text" class="form-control" value="<?php echo $ltqdAppstoreEditInfo['description'] ?>">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Preview Banner URL</label>
											<input name="banner" type="text" class="form-control" value="<?php echo $ltqdAppstoreEditInfo['banner'] ?>">
										</div>
										<div class="text-center">
											<button name="updateltqdappstore" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
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