		
	<!-- Footer -->	
		<!-- JS scripts -->
		
		<!-- Jquery -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Custom JS -->
		<script>
		
		
		<!-- Countdown Script -->
		<!-- pending -->
        $(function(){
			
			 $(".ttg").each(function(){
				 var ele = $(this);
				 var timeCounter 
                window.setInterval(function() {
					timeCounter = ele.html();
                    var updateTime = eval(timeCounter)- eval(.01);
					
					
                    if (timeCounter < 60 && ele.hasClass('min')) {
						console.log(Math.round(updateTime));
						//ele.html(parseFloat(Math.round(updateTime)).toFixed(1));
						//ele.html(parseFloat(updateTime));
						
					}

                    if(updateTime == 0){
						console.log('done')
                    }
                }, 1000);
			 });
        });
		</script>