@section('content')

<!-- content -->
<div class="container center-block row">
  <div class="col-xs-1">&nbsp;</div>

  <div class="col-xs-10">

    @if(isset($err) && $err != null)
    <div>
      <p class="bg-danger">{{ $err }}</p>
    </div>
    @endif

    @if(isset($msg) && $msg != null)
    <div>
      <p class="bg-info">{{ $msg }}</p>
    </div>
    @endif

    <div class="accordion" id="accordion">
      @foreach($ads as $ad) 
    
      <div class="thumbnails">
      <div class="thumbnail clearfix">
      <div class="row">
        <span class="col-xs-12">
          <h3>{{ $ad['title'] }}</h3>
          <h4>{{ $ad['fk_company'] . '<-- get company name' }}</h4>
        </span>
      </div>
      <div class="row">
        <span class="col-xs-10">
          <div class="well">
            <div class="container-fluid">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <p class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" 
                        href="  #collapse_{{ $ad['id'] }}">
                    &nbsp; {{ $ad['short'] }}
                  </p>

                  <div id="collapse_{{ $ad['id'] }}" 
                      class="accordion-body collapse" style="height: 0px; ">
                    <div class="accordion-inner">
                      <p>{{ $ad['ad_text'] }}</p>
                      
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>

                      <div>
                        <small>Owner: {{ $ad['fk_user'] . '<-- username' }}</small>
                        <button type="button" class="btn btn-primary ">
                          Edit ...
                        </button>
                        <button type="button" class="btn btn-primary pull-right"
                              data-toggle="modal" data-target="#myModal_{{ $ad['id'] }}">
                          Apply
                        </button>
                        &nbsp;
                      </div>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="myModal_{{ $ad['id'] }}" tabindex="-1" 
                          role="dialog" aria-labelledby="myModalLabel_{{ $ad['id'] }}" 
                          aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" 
                                aria-hidden="true">
                                &times;
                              </button>
                              <h4 class="modal-title" id="myModalLabel_{{ $ad['id'] }}">
                                Apply for {{ $ad['title'] }} at {{ $ad['fk_company'] }}
                              </h4>
                            </div>
                            
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">
                                  <br>
                                  {{ $ad['short'] }}
                                </p>
                              </div>
                              <div>
                                Send my resume / CV
                                <br>
                                Send my resume / CV
                                <br>
                                Send my resume / CV
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">
                                Cancel
                              </button>
                              <button type="button" class="btn btn-primary">
                                Submit Application
                              </button>
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
