@section('content')
<div class="container center-block">

	<div class="container center-block row">
		<div class="col-xs-1">&nbsp;</div>

		<div class="col-xs-10">

			@if (!Auth::check() && isset($userEnabled) && $userEnabled)
				<div class="well">
					{{ Lang::get('lcl.longText.shoulCreateAccount') }}
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

			{{ Form::label('company', Lang::get('lcl.company')) }}
			@if ($companies)
				{{ Form::select('company', $companies, null, array('class' => 'form-control')) }}
			@else
				{{ Form::text('company_name', null, 
					array('class' => 'form-control', 'placeholder' => Lang::get('lcl.placeholder.companyName'))) 
				}}
			@endif
			<div> &nbsp; </div>

			{{ Form::label('ad_title', Lang::get('lcl.ads.title')) }}
			{{ Form::text('ad_title', null, 
				array('class' => 'form-control', 'placeholder' => Lang::get('lcl.placeholder.adTitle'))) 
			}}
			<div> &nbsp; </div>

			{{ Form::label('ad_description', Lang::get('lcl.shortText')) }}
			{{ Form::textarea('ad_description', null, 
				array('class' => 'form-control', 
					'placeholder' => Lang::get('lcl.placeholder.shortText'), 'rows' => '3'))
			}}
			<div> &nbsp; </div>

			{{ Form::label('ad_text', Lang::get('lcl.ads.text')) }}
			{{ Form::textarea('ad_text', null, 
				array('class' => 'form-control', 
					'placeholder' => Lang::get('lcl.placeholder.adText'), 'rows' => '10', 'cols' => '80')) 
			}}
			<div> &nbsp; </div>
			
			@if(false)
				{{ Form::label('cb_tag[]', Lang::get('lcl.tags')) }}
				<br />
				<span id="tags_groupde">
					@foreach ($tags as $tag)
						{{ Form::checkbox('cb_tag[]', $tag['name']) }}
						{{ Form::label('', $tag['name']) }}
					@endforeach
				</span>
				<div> &nbsp; </div>
			@endif

			{{ Form::label('deadline', Lang::get('lcl.deadline'), array('class' => 'control-lablel')) }}
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
						array('class' => 'form-control', 'placeholder' => Lang::get('lcl.placeholder.location'))) 
				}}
			</div>
			<div> &nbsp; </div>

			{{ Form::submit(Lang::get('lcl.save'), array('class' => 'btn btn-primary')) }}
			{{ Form::reset(Lang::get('lcl.clear'), array('class' => 'btn btn-info')) }}

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

	<script src="js/ckeditor/ckeditor.js"></script>

	<script type="text/javascript">
		CKEDITOR.replace('ad_text');
	</script>

@stop
