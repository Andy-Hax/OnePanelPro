<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Add LTQD Appstore</h6>
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
											<label class="form-label">Category</label>
											<select class="form-control" name="category_id">
												<?php
												foreach ($ltqdCategoryInfo as $thisCategory) {
													echo "<option value='" . $thisCategory['id'] . "'>" . $thisCategory['title'] . "</option>";
												}
												?>
											</select>
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Team A</label>
											<select class="form-control" name="team_a_id">
												<?php
												foreach ($ltqdTeamsInfo as $thisTeam) {
													echo "<option value='" . $thisTeam['id'] . "'>" . $thisTeam['name'] . "</option>";
												}
												?>
											</select>
										</div>
										<div class="input-group input-group-outline mb-3 is-filled">
											<label class="form-label">Team B</label>
											<select class="form-control" name="team_b_id">
												<?php
												foreach ($ltqdTeamsInfo as $thisTeam) {
													echo "<option value='" . $thisTeam['id'] . "'>" . $thisTeam['name'] . "</option>";
												}
												?>
											</select>
										</div>
										<div class="input-group input-group-outline mb-3">
											<label class="form-label">Description</label>
											<input name="description" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3">
											<label class="form-label">Poster URL</label>
											<input name="backdrop" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3">
											<label class="form-label">Start Date/Time (Format must be 2022-01-31 15:00:00)</label>
											<input name="start_timestamp" type="text" class="form-control" value="">
										</div>
										<div class="input-group input-group-outline mb-3">
											<label class="form-label">End Date/Time (Format must be 2022-01-31 15:00:00)</label>
											<input name="end_timestamp" type="text" class="form-control" value="">
										</div>
										
										<div class="text-center">
											<button name="addltqdsportsevents" type="submit" class="btn btn-lg bg-gradient-secondary btn-lg w-100 mt-4 mb-0">Add</button>
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