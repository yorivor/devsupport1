@include('layouts/header2')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<div class="row">
            			<div class="col-md-7">
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" id="search" name="search"></input>
									<div class="input-group-btn">
										<button type="button" class="btn btn-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<div class="glyphicon glyphicon-search"></div>
										</button>
									</div>
								</div>
							</div>
            			</div>
            		</div>
            	</div>
            	<div id="tbody"></div>
            </div>
        </div>
    </div>
</div>
@include('../layouts/footer3')
<script type="text/javascript">
 
$('#search').on('keyup',function(){
 
	$value=$(this).val();
		$.ajax({
			type : 'get',
			url : '{{URL::to('reach')}}',
			data:{'search':$value},
			success:function(data){
			$('#tbody').html(data);
		}
	});
})
 
</script>
 
<script type="text/javascript">
 
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 
</script>
 