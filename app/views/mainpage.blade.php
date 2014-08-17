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
                    &nbsp; {{ $ad['short'] }}
                  </p>

                  <div id="collapse_{{ $ad['id'] }}" 
                      class="accordion-body collapse" style="height: 0px; ">
                    <div class="accordion-inner">
                      <p>{{ $ad['ad_text'] }}</p>
                      
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>

                      <div>
                        @if (Auth::check() && Auth::user()->id == $ad['fk_user'])
                          {{ Form::button('Edit..', array('class' => 'btn btn-primary')) }}
                        @endif
                        {{ Form::button('Apply', 
                            array('class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#myModal_' . $ad['id'])) 
                        }}
                        &nbsp;
                      </div>
                      
                      <!-- Modal -->
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
                                <label for="cvFile">File input</label>
                                {{ Form::file('cvFile', array('class' => 'btn btn-default', 'id' => 'cvFile'))
                                }}
                                <p class="help-block">
                                  <br>
                                  {{ $ad['short'] }}
                                </p>
                              </div>
                              <div>
                                Send my resume / CV
                                <br>
                              </div>
                            </div>
                            <div class="modal-footer">
                              {{ Form::button('Cancel', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
                              {{ Form::button('Submit Application', array('class' => 'btn btn-primary'))}}
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal end --> 

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </span>
        <span class="col-xs-2">
          <img src="http://placehold.it/300x200" alt="Logo"
            class="pull-right img-responsive thumb margin10 img-thumbnail">
        </span>
      </div>
      <div class="row">
        <div class="col-xs-10">

          {{-- TODO: set corect tags --}}
          {{-- TODO: add table tags --}}
          {{-- TODO: add table ad_tags --}}
          <?php $tags = array('CSS', 'HTML', 'Laravel'); ?>
          @if (sizeof($tags) > 0)
            @foreach ($tags as $tag)
              <button type="button" class="btn btn-info">{{ $tag }}</button>
            @endforeach
          @endif

          {{-- TODO get location from DB --}}
          <button type="button" class="btn btn-info pull-right">{{ 'Location' }}</button>
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

@stop
