@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<div class="row">
            			<div class="col-md-10">
            				<h2 style="color:#000;">Technical Helpdesk Submit Ticket</h2>
            			</div>
            		</div>
            	</div>
            	<div class="panel-body">
            		<form class="form-horizontal" role="form" method="POST" action="{{ route('ticketing.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email: </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('concern') ? ' has-error' : '' }}">
                            <label for="concern" class="col-md-4 control-label">Concern: </label>

                            <div class="col-md-6">
                                <select id="concern" class="form-control" name="concern" required autofocus>
                                    <option value="">-- Please Select a Concern --</option>
                                    <option vlaue="Drop down AC issue">AC issue</option>
                                    <option vlaue="Dispute Follow-up">Dispute Follow-up</option>
                                    <option vlaue="Dispute Validation">Dispute Validation</option>
                                </select>

                                @if ($errors->has('concern'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('concern') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="subject" class="col-md-4 control-label">Subject: </label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required autofocus>

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message: </label>

                            <div class="col-md-6">
                                <textarea id="message" rows="7" type="text" class="form-control" name="message" required autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Image Screenshot uploader: </label>

                            <div class="col-md-6">
                                for the screenshot kindly use this link: <a href="https://snag.gy/" target="_blank">snag.gy</a> and paste the image link on your message box
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
                                 <a href="{{ url('baseknowledge') }}" class="btn btn-primary">
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
<div class="mobile-article">
	<div class="row">
		<div class="col-sm-9 text-center">
			<h3 style="color:#000;">Knowledge Base</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9 ">
			
		</div>
	</div>
</div>
@include('../layouts/footer3')