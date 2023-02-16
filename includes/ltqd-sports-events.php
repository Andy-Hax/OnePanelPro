<div class="row mb-4">
	<div class="col-lg-12 col-md-12 mb-md-0">
		<div class="card">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>LTQD Sports Events</h6>
					</div>
					<div class="col-6 text-end">
						<a href="dashboard.php?ltqd-sports-events-add">
							<button class="btn btn-success btn-sm mb-0">Add New</button>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body px-0 pb-2">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-12">
							<div class="card card-plain">
								<div class="card-body">
									<div class="table-responsive p-0">
										<table class="table align-items-center justify-content-center mb-0">
											<thead>
												<tr>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team A</th>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team B</th>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Time</th>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Time</th>
													<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Poster</th>
													<th style="width:50px;"></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($ltqdEventsInfo as $thisEvent) {
												?>
													<tr>
														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<h6 class="mb-0 text-sm"><?php echo $thisEvent['category_id']; ?></h6>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<h6 class="mb-0 text-sm"><?php echo $thisEvent['team_a_id']; ?></h6>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<h6 class="mb-0 text-sm"><?php echo $thisEvent['team_b_id']; ?></h6>
																</div>
															</div>
														</td>
														
														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<h6 class="mb-0 text-sm"><?php echo $thisEvent['start_timestamp']; ?></h6>
																</div>
															</div>
														</td>
														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<h6 class="mb-0 text-sm"><?php echo $thisEvent['end_timestamp']; ?></h6>
																</div>
															</div>
														</td>

														<td>
															<div class="d-flex px-2">
																<div class="my-auto">
																	<img src="<?php echo $thisEvent['backdrop']; ?>" style="max-width:50px;" />
																</div>
															</div>
														</td>
														<td class="align-right">
															<a href="dashboard.php?ltqd-sports-events-edit&id=<?php echo $thisEvent['id']; ?>">
																<button title="Edit" class="btn btn-link text-secondary mb-0">
																	<i class="fa fa-ellipsis-v text-xs"></i>
																</button>
															</a>
															<a onclick="return confirm('Are you sure?');" href="action.php?ltqd-sports-events-delete&id=<?php echo $thisEvent['id']; ?>">
																<button title="Delete" class="btn btn-link text-secondary mb-0">
																	<i class="fa fa-times text-xs text-danger"></i>
																</button>
															</a>
														</td>
													</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>