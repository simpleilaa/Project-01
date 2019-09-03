<div class="container-fluid mt--7">
	<div class="row">
		<div class="col-2">

    </div>
		<div class="col-xl-8 mb-5 mb-xl-0">
			<h2 style="color: white">List Of Channels</h2>
			
			<div class="text-right">
				<a href="<?=base_url()?>admin/add_channels" class="btn btn-sm btn-primary"style="background-color: white;
				color: #646ee4; align-content: right">Add Channels</a>
			</div>
			<br>

			<?php 
			if(count($channels)>0):
				foreach($channels as $key=>$value):
			?>
			<div class="card-header" style="border-radius: 5px">
				<div class="row align-items-center">
					<div class="col-md-8 col-sm-12 col-12 mb-2">
						<strong class="mb-0"><?=$value->channel_name?></strong>
						<small class="mb-0">Channels ID : <?=$value->channel_id?></small>
					</div>
					<div class="col-md-4 col-sm-12 col-12 text-right">
						<a href="<?=base_url()?>admin/edit_channels/<?=$value->id?>" class="btn btn-sm btn-primary">Edit</a>
						<a href="<?=base_url()?>admin/delete_channels/<?=$value->id?>" onclick="confirm('Are you sure to delete this channel?')"class="btn btn-sm btn-primary">Delete</a>
						<a href="<?=base_url()?>admin/detail/<?=$value->channel_id?>" class="btn btn-sm btn-primary">View</a>
					</div>
				</div>
			</div>
			<br>
			<?php 
			endforeach;
			else:
			?>
				<div class="card-header" style="border-radius: 5px">
					<div class="row align-items-center">
						<div class="col">
							<p class="mb-0 text-center">No Channel Available</p>
						</div>
					</div>
				</div>
			<?php
			endif;
			?>
		</div>
		
	</div>
