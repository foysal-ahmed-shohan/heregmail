<?php $__env->startSection('content'); ?>
	<div class="container-fluid app-body">
		<h3>Social Accounts

			<?php if($user->plansubs()): ?>
				<?php if($user->plansubs()['plan']->slug == 'proplusagencym' OR $user->plansubs()['plan']->slug == 'proplusagencyy' ): ?>
					<a href="https://bufferapp.com/oauth2/authorize?client_id=<?php echo e(env('BUFFER_CLIENT_ID')); ?>&redirect_uri=<?php echo e(env('BUFFER_REDIRECT')); ?>&response_type=code" class="btn btn-primary pull-right">Add Buffer Account</a>
				<?php endif; ?>
			<?php endif; ?>




		</h3>

		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline">

					<li>
						<form>
							<input class="form-control" type="text" name="search" placeholder="Search">
							<button class="pull-right" style=" position: relative; margin-top: -27px; border: 0px; background: 0px;  padding-right: 12px; outline: none !important;"> <i class="glyphicon glyphicon-search"></i> </button>
						</form>
					</li>
					<li class="text-right">
						<form id="group-from">
							<select class="form-control group" name="group" onchange="document.getElementById('group-from').submit()">
								<option value="-1">All</option>
							<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</form>

					</li>
					<li>

				</ul>
				<table class="table table-hover social-accounts">
					<thead>
					<tr>
						<th>Group Name</th>
						<th>Group Type</th>
						<th>Account Name</th>
						<th>Post Text</th>
						<th>Time</th>
					</tr>
					</thead>
					<tbody>
					<?php $__currentLoopData = $postings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td>
							<?php echo e($posting->groupInfo->name); ?>

						</td>
						<td>
							<?php echo e($posting->groupInfo->type); ?>

						</td>
						<td width="350">
							<div class="media">
								<div class="media-left">
									<a href="">
										<span class="fa fa-<?php echo e($posting->accountInfo->type); ?>"></span>
										<img width="50" class="media-object img-circle" src="<?php echo e($posting->accountInfo->avatar); ?>" alt="">
									</a>
								</div>
								<div class="media-body media-middle" style="width: 180px;">
									<h4 class="media-heading"><?php echo e($posting->accountInfo->name); ?></h4>
								</div>
							</div>
						</td>

						<td>
							<?php echo e($posting->post->text); ?>

						</td>
						<td>
							<?php echo e($posting->post->created_at->format('d M, Y h:i a')); ?> (<?php echo e($posting->post->created_at->setTimezone('America/Chicago')
							->timezone->getName()); ?>)
						</td>

					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<div class="text-right">
					<?php echo e($postings->links()); ?>

				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>