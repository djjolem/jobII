@section('content')

<!-- content -->
<div class="container center-block row">
  <div class="col-xs-1">&nbsp;</div>

  <div class="col-xs-10">

    @if(isset($err) && $err != null)
    <div>
      @foreach($err as $error)
        <p class="bg-danger">{{ $error }}</p>
      @endforeach
    </div>
    @endif

    @if(isset($msg) && $msg != null)
    <div>
      @foreach($msg as $message)
        <p class="bg-info">{{ $message }}</p>
      @endforeach
    </div>
    @endif
    <div class="accordion" id="accordion">
      @foreach($ads as $ad)
    
      <div class="thumbnails">
      <div class="thumbnail clearfix">
      <div class="row">
        <span class="col-xs-12">
          <h3>{{ $ad['title'] }}</h3>
          <h4>{{ $ad['fk_company'] . '-- get company name' }}</h4>
        </span>
      </div>
      
      <div class="row">
        <span class="col-xs-10">
          <div class="well">
            <div class="container-fluid">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <p class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" 
                        href="#collapse_{{ $ad['id'] }}">
                    <strong>{{ $ad['short'] }}</strong>
                  </p>

                  <div id="collapse_{{ $ad['id'] }}" 
                      class="accordion-body collapse" style="height: 0px; ">
                    <div class="accordion-inner">
                      <p>{{ $ad['ad_text'] }}</p>
                      
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>

                      <div>
                        
                        @if (Auth::check() && Auth::user()->id == $ad['fk_user'])
                          {{ Form::button(Lang::get('lcl.edit..'), 
                              array('class' => 'btn btn-primary', 
                                'onclick' => 'submitForm("adedit", ' . $ad['id'] . ')')) 
                          }}
                          {{ Form::button(Lang::get('delete..'), 
                            array('class' => 'btn btn-primary', 
                              'onclick' => 'submitForm("addelete", ' . $ad['id'] . ')' ))  
                          }}
                        @else 
                          {{ Form::button(Lang::get('lcl.apply..'),
                              array('class' => 'btn btn-primary pull-right', 
                                'data-toggle' => 'modal', 'data-target' => '#myModal_' . $ad['id'])) 
                          }}
                        @endif
                        &nbsp;
                      </div>
                      
                      <!-- Modal -->
                      {{ Form::open(array('url' => 'commitcv', 'method' => 'POST', 'name' => 'commit_cv', 'id' => 'commit_cv', 'class' => 'form', 'role' => 'form',  'enctype' =>'multipart/form-data')) 
                      }}
                      
                      @if (Auth::user() != null)
                        {{ Form::hidden('user_id', Auth::user()->id) }}
                      @else
                        {{ Form::hidden('user_id', '0') }}
                      @endif

                      {{-- Modal: Apply for job --}}
                      {{ Form::hidden('ad_id', $ad['id']) }}
                      <div class="modal fade" id="myModal_{{ $ad['id'] }}" 
                          name="myModal_{{ $ad['id'] }}" tabindex="-1" 
                          role="dialog" aria-labelledby="myModalLabel_{{ $ad['id'] }}" 
                          aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              {{ Form::button('&times;', array('class' => 'close', 'data-dismiss' => 'modal', 'aria-hidden' => 'true')) }}
                              <h4 class="modal-title" id="myModalLabel_{{ $ad['id'] }}">
                                Apply for {{ $ad['title'] }} at {{ $ad['fk_company'] }}
                              </h4>
                            </div>
                            
                            <div class="modal-body">
                              <div class="form-group">
                                {{ Form::label('shortdesc', Lang::get('lcl.adDesc'), array('calss' => '')) }}
                                <p id='shortdesc' class="help-block">
                                  {{ $ad['short'] }}
                                  <br>
                                </p>

                                {{ Form::label('cvFile', Lang::get('lcl.fileInput'), array('class' => '', )) }}
                                {{ Form::file('cvFile', array('class' => 'btn btn-default', 'id' => 'cvFile'))
                                }}

                                <br />

                                {{ Form::label('message', Lang::get('lcl.additional')) }}
                                {{ Form::textarea('message', null, 
                                  array('class' => 'form-control input-large', 
                                    'placeholder' => Lang::get('lcl.placeholder.additional'), 'rows' => '3')) 
                                }}
                              </div>
                            </div>

                            <div class="modal-footer">
                            {{ Form::button(Lang::get('lcl.cancel'),
                              array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) 
                            }}
                            {{ Form::button(Lang::get('lcl.matching..'), array('class' => 'btn btn-primary')) }}
                            {{ Form::submit(Lang::get('lcl.apply'), array('class' => 'btn btn-primary')) }}
                            </div>
                          </div>
                        </div>
                      </div>
                      {{ Form::close() }}
                      <!-- Modal end --> 

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </span>
        <span class="col-xs-2">
          <img src="http://placehold.it/300x200" alt="Logo"
            class="pull-right img-responsive thumb margin10 img-thumbnail" />

          {{ Form::button(Lang::get('lcl.aboutCompany'), array('class' => 'btn btn-default')) }}
        </span>
      </div>
      <div class="row">
        <div class="col-xs-10">
          <?php $tags = $ad['tags']; ?>
          @if (isset($tags) && sizeof($tags) > 0)
            @foreach ($tags as $tag)
              <button type="button" class="btn btn-info">{{ $tag }}</button>
            @endforeach
          @endif

          @if ($ad['location'] != '')
            <button type="button" class="btn btn-info pull-right">{{ $ad['location'] }}</button>
          @endif
        </div>
        <div class="col-xs-2">
          <h4>
            <?php 
              $deadline = date('Y-m-d', strtotime($ad['deadline']));
              $oneweek = date('Y-m-d', strtotime("+1 week"));
            ?>

            @if ($oneweek >= $deadline)
              <span class='label label-danger'>{{ $deadline }}</span>
            @else
              <span class='label label-default'>{{ $deadline }}</span>
            @endif
          </h4>
        </div>
      </div>
      </div>
      </div>

      @endforeach

    </div>
  </div><!-- class="col-xs-10" -->

  <div class="col-xs-1">&nbsp;</div>
</div><!-- content" -->

{{ Form::open(array('url' => 'adedit', 'method' => 'POST', 'name' => 'adedit', 'id' => 'adedit', 
    'class' => 'form', 'role' => 'form')) }}
  {{ Form::hidden('adedit', 'adedit') }}
  {{ Form::hidden('ad_id', '', array('id' => 'ad_id')) }}
{{ Form::close() }}

{{ Form::open(array('url' => 'addelete', 'method' => 'POST', 'name' => 'addelete', 'id' => 'addelete', 
    'class' => 'form', 'role' => 'form')) }}
  {{ Form::hidden('addelete', 'addelete') }}
  {{ Form::hidden('ad_id', '', array('id' => 'ad_id')) }}
{{ Form::close() }}

<script type="text/javascript">
var submitForm = function(formName, adId) {
  document.getElementById("ad_id").value = adId;
  document.getElementById(formName).submit();
}

</script>

@stop
