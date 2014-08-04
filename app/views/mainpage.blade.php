<!-- content -->
<div class="container center-block row">
  <div class="col-xs-1">&nbsp;</div>

  <div class="col-xs-10">
    <div class="accordion" id="accordion">
    
      @foreach($ads as $ad) 

      <div class="thumbnails">
      <div class="thumbnail clearfix">
      <div class="row">
        <span class="col-xs-12">
          <h3>{{ 'ad - title' }}</h3>
          <h4>{{ 'ads - cmpny name' }}</h4>
        </span>
      </div>
      <div class="row">
        <span class="col-xs-10">
          <div class="well">
            <div class="container-fluid">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <p class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" 
                        href="  #collapse_<?php //   // echo $ads[$i]['job_id']; ?>">
                    &nbsp; {{ 'ads - ad short' }}
                  </p>

                  <div id="collapse_<?php // echo $ads[$i]['job_id']; ?>" 
                      class="accordion-body collapse" style="height: 0px; ">
                    <div class="accordion-inner">
                      <p>{{ 'ads ad text' }}</p>
                      
                      <div>&nbsp;</div>
                      <div>&nbsp;</div>

                      <div>
                        <small>Owner: {{ 'owner' }}</small>
                        <button type="button" class="btn btn-primary ">
                          Edit ...
                        </button>
                        <button type="button" class="btn btn-primary pull-right"
                              data-toggle="modal" data-target="#myModal_<?php // echo $i; ?>">
                          Apply
                        </button>
                        &nbsp;
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal_<?php // echo $i; ?>" tabindex="-1" 
                          role="dialog" aria-labelledby="myModalLabel_<?php // echo $i; ?>" 
                          aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" 
                                aria-hidden="true">
                                &times;
                              </button>
                              <h4 class="modal-title" id="myModalLabel_<?php // echo $i; ?>">
                                Apply for {{ 'ad title'}} at {{ 'company name' }}
                              </h4>
                            </div>
                            
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">
                                  <br>
                                  {{ 'ad short' }}
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
          <?php $tags = array('CSS', 'HTML', 'Laravel'); ?>
          @if (sizeof($tags) > 0)
            @foreach ($tags as $tag)
              <button type="button" class="btn btn-info">{{ $tag }}</button>
            @endforeach
          @endif

          <button type="button" class="btn btn-info pull-right">Location</button>
        </div>
        <div class="col-xs-2">
          <h4>
            {{-- TODO: deadline change if condition --}}
            {{-- $deadline = date($ads[$i]['deadline']) --}}
            {{-- $oneweek = date('Y-m-d', strtotime("+1 week")) --}}
            {{-- if($deadline < $oneweek) --}}
            @if (true)
              <span class='label label-danger'>{{ '2014-08-30' }}</span>
            @else
              <span class='label label-default'>{{ '2014-08-30' }}</span>
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