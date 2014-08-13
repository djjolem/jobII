@section('content')

<div class="container center-block">

	<div class="container center-block row">
		<div class="col-xs-2">&nbsp;</div>

		<div class="col-xs-8">

			@if (!isset($userId) || $userId == 0)
			<div class="well">
				<p>Shoul I create an account?</p>
				<p>Button ??</p>
				<p>Button New account</p>
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
				
				<!-- 
					TODO: is this hidden field necessary 
					User id is posible take from session ???
				 -->
				{{ Form::hidden('user_id', $userId) }}
				<div> &nbsp; </div>

				{{ Form::label('company', 'Company') }}
				{{ Form::select('company', $companies, null, array('class' => 'form-control')) }}
				<div> &nbsp; </div>

				{{ Form::label('ad_title', 'Title') }}
				{{ Form::text('ad_title', null, 
						array('class' => 'form-control', 'placeholder' => 'Ad title')) 
				}}
				<div> &nbsp; </div>

				{{ Form::label('ad_description', 'Short text') }}
				{{ Form::textarea('ad_description', null, 
						array('class' => 'form-control', 'placeholder' => 'Short description', 'rows' => '3'))
				}}
				<div> &nbsp; </div>

				{{ Form::label('ad_text', 'Ad text') }}
				{{ Form::textarea('ad_text', null, 
						array('class' => 'form-control', 'placeholder' => 'Text of ad', 'rows' => '10' )) 
				}}
				<div> &nbsp; </div>

				{{ Form::label('cb_tag[]', 'Tags') }}
				<br />
				<span id="tags_groupde">
					@foreach ($tags as $tagId => $tagName)
						{{ Form::checkbox('cb_tag[]', $tagName) }}
						{{ Form::label('', $tagName) }}
					@endforeach
				</span>
				<div> &nbsp; </div>

				{{ Form::label('deadline', 'Deadline', array('class' => 'control-lablel')) }}
				<div class="well form-group">
					<div class="input-group date">
						{{ Form::date('deadline', null, 
								array('class' => 'form-control', 'data-format' => 'yyyy-mm-dd' )) 
						}}
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-calendar"></i>
						</span>
					</div>
				</div>
				<div> &nbsp; </div>

				<div>
					{{ Form::label('Location') }}
					<br>
					Location - make list of locations
				</div>
				<div> &nbsp; </div>

				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

				{{ Form::reset('Clear', array('class' => 'btn btn-info')) }}

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