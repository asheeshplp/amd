<?php include 'header.php' ?>
<body>
	<div class="overlay" style="display:none;"><div class="overlay-content"><img src="loading.gif" alt="Loading..."/></div></div>
	<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php' ?>
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
		
        <div class="container" id="target">
			<div class="row">
					<div class="col-md-7 formdiv">
						<div class="wrapper wrapper-content animated fadeInUp">
							<div class="ibox">
								<div class="ibox-content">
									<div class="row">
										<div class="col-lg-12">
											<div class="m-b-md">												
												<h2>Send SMS Message</h2>
											</div>
											<hr>
											<dl class="dl-horizontal">
												<dt>Please fill below form in order to send SMS Message:</dd>
											</dl>
										</div>
									</div>
									<div class="row">
										<form method="post" id="sendbulksmsform"> 
											<div class="form-group">
												<label for="mobile-number">To</label>
												<!--<input type="tel" class="form-control" id="mobile-number" name="mobile-number" placeholder="Enter number" required>  --> 
												<input type="text" class="form-control" id="bulk-number" name="bulk-number" placeholder="Enter comma seprated mobile number with country code" required>
											</div>
											<div class="form-group">
												<label for="from">From</label>
												<input type="text" name="from" class="form-control" id="from"  placeholder="From" required>   
											</div>							
											<div class="form-group">
												<label for="message">Message</label>
												<textarea class="form-control" id="message" name="message" rows="4" cols="50"  required> </textarea>
											</div>
											<div class="m-t-md pull-right">
												<button type="submit" name="send" id="previewbtn" value="SendSMS" class="btn btn-primary pull-right">Analyse & Send</button>
											</div>
										</form>										
									</div>									
								</div>								
							</div>
						</div>
					</div>
					<div class="col-md-5 previewdiv" style="display:none;">
						<div class="wrapper wrapper-content project-manager">
							<h2>Preview/Analysis Report</h2>
							<p class="small">
								Please find the below Analysis Report.
							</p>
							<h5><br /></h5>
							<h5>Message Preview</h5>
							<hr>
							<ul class="tag-list" style="padding: 0">
								<li><a href="javascript:void(0);"><i class="fa fa-tag"></i><b>From:</b> <span id="showfrom"> </span></a></li>
								<li><a href="javascript:void(0);"><i class="fa fa-tag"></i><b>Message:</b> <span id="showmsg"> </span> </a></li>
							</ul>
							<h5><br /></h5>
							<h5>Analysis Report</h5>
							<hr>
							<dl class="dl-horizontal">
								<dt>Recipients:</dt> <dd id="reciptnt"></dd>
								<dt>Recipients Per Country:</dt> 
								<div id='recipientCountries'>
								</div>
								<dt >Recipient Countries:</dt> 
									<div id='recipientsPerCountry'>
								</div>
								<dt>Number Of Parts:</dt> <dd id="parts"> </dd>
								<dt>Unicode:</dt> <dd id="unicode">  </dd>
								<dt>Characters:</dt> <dd id="chars">  </dd>
							</dl>
							
							<div class="text-center m-t-md">
								<a href="javascript:void(0);" id="sendbulksmsnow" class="btn btn-xs btn-primary">Send Now</a>
								<a href="javascript:void(0);" id="cancel" class="btn btn-xs btn-primary">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
  <!-- /#wrapper -->
<?php include 'footer.php'; ?>
</body>
</html>
