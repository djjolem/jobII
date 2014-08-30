@section('content')

<div class="container center-block">
	<div class="col-xs-1">&nbsp;</div>

	<div class="col-xs-10">
		<h2>Edit ad</h2>

		{{ Form::open(array(
					'url' => 'saveadedit',
					'method' => 'POST',
					'name' => 'edit_ad',
					'id' => 'edit_ad',
					'class' => 'form-horizontal',
					'role' => 'form',
					)
				) 
			}}

			{{ Form::label('ad_title', 'Title') }}
			{{ Form::text('ad_title', $ad['title'], array('class' => 'form-control')) }}
			<div> &nbsp; </div>

			{{ Form::label('ad_description', 'Short text') }}
			{{ Form::textarea('ad_description', $ad['short'], array('class' => 'form-control', 'rows' => '3')) }}
			<div> &nbsp; </div>

			{{ Form::label('ad_text', 'Ad text') }}
			{{ Form::textarea('ad_text', $ad['ad_text'], array('class' => 'form-control', 'rows' => '10' )) }}
			<div> &nbsp; </div>

			{{ Form::label('cb_tag[]', 'Tags') }}
			<br />
			<span id="tags_groupde">
				<?php $tags = $ad['tags']; ?>
				@foreach ($tags as $tag)
					{{ Form::checkbox('cb_tag[]', $tag) }}
					{{ Form::label('', $tag) }}
				@endforeach

				<br />
				<span>Ad/Delete tags</span>
			</span>
			<div> &nbsp; </div>

			<div>
			{{ Form::label('location', 'Location', array('class' => 'control-lablel')) }}
			{{ Form::text('location', $ad['location'], array('class' => 'form-control')) }}
			</div>
			<div> &nbsp; </div>

			{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>

	<div class="col-xs-1">&nbsp;</div>
</div>

@stop
