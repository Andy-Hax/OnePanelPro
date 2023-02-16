<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Edit LTQD Sports Team</h6>
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
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Name</label>
											<input name="id" type="hidden" value="<?php echo $ltqdSportsTeamEditInfo['id'] ?>" />
											<input name="name" type="text" class="form-control" value="<?php echo $ltqdSportsTeamEditInfo['name'] ?>">
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Badge Image URL</label>
											<input name="flag" type="text" class="form-control" value="<?php echo $ltqdSportsTeamEditInfo['flag'] ?>">
										</div>
										<div class="text-center">
											<button name="updateltqdsportsteams" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Update</button>
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