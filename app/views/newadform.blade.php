@section('content')

<div class="container center-block">

	<div class="container center-block row">
		<div class="col-xs-2">&nbsp;</div>

		<div class="col-xs-8">

			@if (!isset($user))
			<div class="well">
				<p>Shoul I create an account?</p>
			</div>
			@endif

			{{ Form::open(array(
					'url' => 'savead',
					'method' => 'POST',
					'name' => 'new_ad',
					'id' => 'new_ad',
					'class' => 'form-horizontal',
					'role' => 'form',
					)
				) 
			}}
				<h2>Add a new ad</h2>
				
				<input name="user" value="0" />
				

				<input type="hidden" name="user_id" value="<?php echo 0; // user id  ?>" />
				
				<input type="hidden" name="user_id" value="0" />

				<div> &nbsp; </div>

				{{ Form::label('company', 'Company') }}
				<select id="company" name="company" class="form-control">
					<option value="0"> Choose company </option>
					<?php /* 
					$companies = $model->getCompanies();
					for ($i=0; $i<sizeof($companies); $i++){
						*/
					?>
					<option value="<?php //  echo ($i+1); ?>"> 
						Company <?php // echo $companies[$i]; ?>
					</option>
					<?php //  } ?>
				</select>
				<div> &nbsp; </div>

				{{ Form::label('ad_title', 'Title') }}
				<input type="text" class="form-control" placeholder="Ad Title" id="ad_title" 
					name="ad_title" />
				<div> &nbsp; </div>

				{{ Form::label('ad_description', 'Short text') }}
				<textarea class="form-control" rows="3" placeholder="Short description" 
					id="ad_description" name="ad_description">
				</textarea>
				<div> &nbsp; </div>

				{{ Form::label('ad_text', 'Ad text') }}
				<textarea class="form-control" rows="10" placeholder="Text of ad" 
					id="ad_text" name="ad_text">
				</textarea>
				<div> &nbsp; </div>


				<!--- <div class="form-group">-->
				{{ Form::label('tags', 'Tags') }}
				<?php /*
				   $tags = $model->getTags();
				   for($i=0; $i<sizeof($tags); $i++){
				   */?>
				<label class="checkbox-inline">
					<input type="checkbox" id="cb_tag" name="cb_tag[]" 
						value="<?php // echo $tags[$i]['tag_id']; ?>" />
						<?php // echo $tags[$i]['tname']; ?>
				</label>
				<?php // } ?>

				<div> &nbsp; </div>
				<label class="control-lablel"> Deadline </label>
				<br>

				<div class="well">
					<div class="form-group">
						<div class="input-group date">
							<input class="form-control" type="text" data-format="yyyy-MM-dd" 
								id="deadline" name="deadline" />
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-calendar"></i>
							</span>
						</div>
					</div>
				</div>
				<div> &nbsp; </div>

				<div>
					{{ Form::label('Location') }}
					<br>
					Location - make list of locations
				</div>
				<div> &nbsp; </div>

				<button type="submit" class="btn btn-primary">Submit</button>

			{{ Form::close() }}
		</div>
	</div>

	<div class="col-xs-2">&nbsp;</div>
</div>


<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
	$(document).ready(function($){
		$('#deadline').datepicker();
	});
</script>

@stop