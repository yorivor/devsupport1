@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Top 10 KB</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('knowbase_top.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('waiting_message') ? ' has-error' : '' }}">
                            <label for="waiting_message" class="col-md-4 control-label">Waiting Time: </label>

                            <div class="col-md-6">
                                    @if(!$check_top->waiting_time)
                                        <input type="text" id="waiting_message" class="form-control" name="waiting_message" value="{{ old('waiting_message') }}" autofocus />
                                    @else
                                        <input type="text" id="waiting_message" class="form-control" name="waiting_message" value="{{ $check_top->waiting_time }}" autofocus />
                                    @endif

                                @if(session()->has('waiting_message'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ session()->get('waiting_message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_one') ? ' has-error' : '' }}">
                            <label for="number_one" class="col-md-4 control-label">1: </label>

                            <div class="col-md-6">
                                <select id="number_one" type="text" class="form-control" name="number_one" required autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $one = DB::table('knowledge_article')->get();
                                        $counton = count($one);
                                    ?>
                                    @if(!$counton)
                                    @else
                                        @foreach($one as $eno)
                                            @if(!$count)
                                                <option value="{{ $eno->knowledge_article_id }}">{{ $eno->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $eno->knowledge_article_id }}" <?php if(isset($eno->knowledge_article_id) && $eno->knowledge_article_id == $check_top->article_one) echo 'selected="selected"';?>>{{ $eno->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_one'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_one') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_two') ? ' has-error' : '' }}">
                            <label for="number_two" class="col-md-4 control-label">2: </label>

                            <div class="col-md-6">
                                <select id="number_two" type="text" class="form-control" name="number_two" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $two = DB::table('knowledge_article')->get();
                                        $counttw = count($two);
                                    ?>
                                    @if(!$counttw)
                                    @else
                                        @foreach($two as $owt)
                                            @if(!$count)
                                                <option value="{{ $owt->knowledge_article_id }}">{{ $owt->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $owt->knowledge_article_id }}" <?php if(isset($owt->knowledge_article_id) && $owt->knowledge_article_id == $check_top->article_two) echo 'selected="selected"';?>>{{ $owt->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_two'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_two') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_three') ? ' has-error' : '' }}">
                            <label for="number_three" class="col-md-4 control-label">3: </label>

                            <div class="col-md-6">
                                <select id="number_three" type="text" class="form-control" name="number_three" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $three = DB::table('knowledge_article')->get();
                                        $countth = count($three);
                                    ?>
                                    @if(!$countth)
                                    @else
                                        @foreach($three as $eerht)
                                            @if(!$count)
                                                <option value="{{ $eerht->knowledge_article_id }}">{{ $eerht->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $eerht->knowledge_article_id }}" <?php if(isset($eerht->knowledge_article_id) && $eerht->knowledge_article_id == $check_top->article_three) echo 'selected="selected"';?>>{{ $eerht->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_three'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_three') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_four') ? ' has-error' : '' }}">
                            <label for="number_four" class="col-md-4 control-label">4: </label>

                            <div class="col-md-6">
                                <select id="number_four" type="text" class="form-control" name="number_four" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $four = DB::table('knowledge_article')->get();
                                        $countfo = count($four);
                                    ?>
                                    @if(!$countfo)
                                    @else
                                        @foreach($four as $ruof)
                                            @if(!$count)
                                                <option value="{{ $ruof->knowledge_article_id }}">{{ $ruof->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $ruof->knowledge_article_id }}" <?php if(isset($ruof->knowledge_article_id) && $ruof->knowledge_article_id == $check_top->article_four) echo 'selected="selected"';?>>{{ $ruof->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_four'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_four') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_five') ? ' has-error' : '' }}">
                            <label for="number_five" class="col-md-4 control-label">5: </label>

                            <div class="col-md-6">
                                <select id="number_five" type="text" class="form-control" name="number_five" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $five = DB::table('knowledge_article')->get();
                                        $countfi = count($five);
                                    ?>
                                    @if(!$countfi)
                                    @else
                                        @foreach($five as $evif)
                                            @if(!$count)
                                                <option value="{{ $evif->knowledge_article_id }}">{{ $evif->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $evif->knowledge_article_id }}" <?php if(isset($evif->knowledge_article_id) && $evif->knowledge_article_id == $check_top->article_five) echo 'selected="selected"';?>>{{ $evif->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_five'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_five') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_six') ? ' has-error' : '' }}">
                            <label for="number_six" class="col-md-4 control-label">6: </label>

                            <div class="col-md-6">
                                <select id="number_six" type="text" class="form-control" name="number_six" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $six = DB::table('knowledge_article')->get();
                                        $countsi = count($six);
                                    ?>
                                    @if(!$countsi)
                                    @else
                                        @foreach($six as $xis)
                                            @if(!$count)
                                                <option value="{{ $xis->knowledge_article_id }}">{{ $xis->knowledge_article_title }}</option>
                                            @else
                                                <option value="{{ $xis->knowledge_article_id }}" <?php if(isset($xis->knowledge_article_id) && $xis->knowledge_article_id == $check_top->article_six) echo 'selected="selected"';?>>{{ $xis->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_six'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_six') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_seven') ? ' has-error' : '' }}">
                            <label for="number_seven" class="col-md-4 control-label">7: </label>

                            <div class="col-md-6">
                                <select id="number_seven" type="text" class="form-control" name="number_seven" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $seven = DB::table('knowledge_article')->get();
                                        $countse = count($seven);
                                    ?>
                                    @if(!$countse)
                                    @else
                                        @foreach($seven as $neves)
                                            @if(!$count)
                                                <option value="{{ $neves->knowledge_article_id }}">{{ $neves->knowledge_article_title }}</option>
                                            @else                                            
                                                <option value="{{ $neves->knowledge_article_id }}" <?php if(isset($neves->knowledge_article_id) && $neves->knowledge_article_id == $check_top->article_seven) echo 'selected="selected"';?>>{{ $neves->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_seven'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_seven') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_eight') ? ' has-error' : '' }}">
                            <label for="number_eight" class="col-md-4 control-label">8: </label>

                            <div class="col-md-6">
                                <select id="number_eight" type="text" class="form-control" name="number_eight" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $eight = DB::table('knowledge_article')->get();
                                        $countei = count($eight);
                                    ?>
                                    @if(!$countei)
                                    @else
                                        @foreach($eight as $thgie)
                                            @if(!$count)
                                                <option value="{{ $thgie->knowledge_article_id }}">{{ $thgie->knowledge_article_title }}</option>
                                            @else                                            
                                                <option value="{{ $thgie->knowledge_article_id }}" <?php if(isset($thgie->knowledge_article_id) && $thgie->knowledge_article_id == $check_top->article_eight) echo 'selected="selected"';?>>{{ $thgie->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_eight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_eight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_nine') ? ' has-error' : '' }}">
                            <label for="number_nine" class="col-md-4 control-label">9: </label>

                            <div class="col-md-6">
                                <select id="number_nine" type="text" class="form-control" name="number_nine" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $nine = DB::table('knowledge_article')->get();
                                        $countni = count($nine);
                                    ?>
                                    @if(!$countni)
                                    @else
                                        @foreach($nine as $enin)
                                            @if(!$count)
                                                <option value="{{ $enin->knowledge_article_id }}">{{ $enin->knowledge_article_title }}</option>
                                            @else                                            
                                                <option value="{{ $enin->knowledge_article_id }}" <?php if(isset($enin->knowledge_article_id) && $enin->knowledge_article_id == $check_top->article_nine) echo 'selected="selected"';?>>{{ $enin->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_nine'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_nine') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_ten') ? ' has-error' : '' }}">
                            <label for="number_ten" class="col-md-4 control-label">10: </label>

                            <div class="col-md-6">
                                <select id="number_ten" type="text" class="form-control" name="number_ten" autofocus>
                                    <option value="">None</option>
                                    <?php
                                        $ten = DB::table('knowledge_article')->get();
                                        $countte = count($ten);
                                    ?>
                                    @if(!$countte)
                                    @else
                                        @foreach($ten as $net)
                                            @if(!$count)
                                                <option value="{{ $net->knowledge_article_id }}">{{ $net->knowledge_article_title }}</option>
                                            @else

                                                <option value="{{ $net->knowledge_article_id }}" <?php if(isset($net->knowledge_article_id) && $net->knowledge_article_id == $check_top->article_ten) echo 'selected="selected"';?>>{{ $net->knowledge_article_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('number_ten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_ten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                            </div>
                            @if(session()->has('errors'))
                                <div class="alert alert-danger">
                                    {{ session()->get('errors') }}
                                </div>
                            @endif
                        @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                 <a href="{{ url('knowledge_management') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
