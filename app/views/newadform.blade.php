@section('content')

<div class="container center-block">

	<div class="container center-block row">
		<div class="col-xs-1">&nbsp;</div>

		<div class="col-xs-10">

			@if (!Auth::check())
				<div class="well">
					<p>Shoul I create an account?</p>
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
				@foreach ($tags as $tag)
					{{ Form::checkbox('cb_tag[]', $tag['name']) }}
					{{ Form::label('', $tag['name']) }}
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
				{{ Form::label('location', 'Location', array('class' => 'control-lablel')) }}
				{{ Form::text('location', null, 
						array('class' => 'form-control', 'placeholder' => 'Location')) 
				}}
			</div>
			<div> &nbsp; </div>

			{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
			{{ Form::reset('Clear', array('class' => 'btn btn-info')) }}

			{{ Form::close() }}
		</div>
	</div>

	<div class="col-xs-1">&nbsp;</div>
</div>

@stop

@section('scripts')
	{{ HTML::script('js/bootstrap-datepicker.js')}}

	<script type="text/javascript">
	$(document).ready(function($){
		$('#deadline').datepicker();
	});
	</script>

	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			theme : "advanced",
			mode : "textareas",
			plugins : "fullpage",
			theme_advanced_buttons3_add : "fullpage"
		});
	</script>


</form>
@stop
