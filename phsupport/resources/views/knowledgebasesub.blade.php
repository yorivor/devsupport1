@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
              <div class="knowborder">
                <h2 style="color:#000;">Knowledge Base - {{ $knowledgecat->category }}</h2>
              </div>
              <?php
                  $knowledgeart = DB::table('knowledge_article')->where('knowledge_category_id', $knowledgecatid)->where('sub_knowledge_category_id', $sub_id)->paginate(10);
                   $count2 = count($knowledgeart);
                 ?>
                 @if(! $count2)
                    No Record
                 @else
                    <?php $i = 0; ?>
                    @foreach($knowledgeart as $arti)
                      @if($i == 0)
                        <a href="{{ url('knowdesc/'.$knowledgecatid.'/'.$sub_id.'/'.$arti->knowledge_article_id) }}">
                          <div class="knowlist">
                            <div class="row">
                              <div class="col-md-10"">
                                {{ $arti->knowledge_article_title }}
                              </div>
                              <div class="col-md-2 text-right">
                                <div class="glyphicon glyphicon-expand"></div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php $i++; ?>
                      @else
                        <a href="{{ url('knowdesc/'.$knowledgecatid.'/'.$sub_id.'/'.$arti->knowledge_article_id) }}">
                          <div class="knowlist2">
                            <div class="row">
                              <div class="col-md-10"">
                                {{ $arti->knowledge_article_title }}
                              </div>
                              <div class="col-md-2 text-right">
                                <div class="glyphicon glyphicon-expand"></div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php $i=0; ?>
                      @endif
                    @endforeach
                  <div class="row">
                    <div class="col-md-10">
                      {{ $knowledgeart->links() }}
                    </div>
                    <div class="col-md-2 text-right">
                      <br />
                      <a href="{{ url('knowsubcat/'.$knowledgecatid) }}" class="btn btn-info">Back</a>
                    </div>
                  </div>
                 @endif
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
  <div class="row">
    <div class="text-center">
      <h3 style="color:#000;">Knowledge Base - {{ $knowledgecat->category }}</h3>
    </div>
    <div class="row">
      <div class="col-sm-9">
          <?php
          $knowledgeart = DB::table('knowledge_article')->where('knowledge_category_id', $knowledgecatid)->where('sub_knowledge_category_id', $sub_id)->paginate(10);
           $count2 = count($knowledgeart);
         ?>
         @if(! $count2)
            No Record
         @else
            <?php $i = 0; ?>
            @foreach($knowledgeart as $arti)
              @if($i == 0)
                <a href="{{ url('knowdesc/'.$knowledgecatid.'/'.$sub_id.'/'.$arti->knowledge_article_id) }}">
                  <div class="knowlist">
                    <div class="row">
                      <div class="col-md-4"">
                        {{ $arti->knowledge_article_title }}
                      </div>
                    </div>
                  </div>
                </a>
                <?php $i++; ?>
              @else
                <a href="{{ url('knowdesc/'.$knowledgecatid.'/'.$sub_id.'/'.$arti->knowledge_article_id) }}">
                  <div class="knowlist2">
                    <div class="row">
                      <div class="col-md-4"">
                        {{ $arti->knowledge_article_title }}
                      </div>
                    </div>
                  </div>
                </a>
                <?php $i=0; ?>
              @endif
            @endforeach
          <div class="row">
            <div class="col-md-10">
              {{ $knowledgeart->links() }}
            </div>
            <div class="col-md-2 text-right">
              <br />
              <a href="{{ url('knowsubcat/'.$knowledgecatid) }}" class="btn btn-info">Back</a>
            </div>
          </div>
         @endif
      </div>
    </div>
  </div>
</div>
@include('layouts/footer2')