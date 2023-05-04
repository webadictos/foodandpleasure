jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.loadmore').click(function(e){
		e.preventDefault();
		var button = $(this),
			container = $("."+button.data("container")),
		    data = {
			'action': 'loadmorehome',
			'page' : food_loadmore.current_page,
            'not':button.data("not-in"),
		};

        $.ajax({ // you can also use $.post here
			url : food_loadmore.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				container.append( ' <div class="col-12 text-center loader"><div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div></div>');
			},
			success : function( data ){
				if( data ) { 
					$('.loader').remove();
					container.append(data);
				     var pnum=food_loadmore.current_page;	

                 food_loadmore.current_page++;
					//$('.masonry-bootstrap-page'+instyle_loadmore_params.current_page).masonry();

					
					if ( food_loadmore.current_page == food_loadmore.max_page ) 
						button.remove(); // if last page, remove the button
 
					// you can also fire the "post-load" event here if you use a plugin that requires it
					//$( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});

/*
jQuery(function($){
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 1400; // the distance (in px) from the page bottom when you want to load more posts
 
  function getArchiveScrollOfsset(){
		return $(document).height() - bottomOffset;
	}

	$(window).scroll(function(){
		var data = {
			'action': 'loadmore',
			'query': instyle_loadmore_params.posts,
			'page' : instyle_loadmore_params.current_page
		};
	//	console.log("Scroll: "+$(document).scrollTop()+ "Validation: "+ getArchiveScrollOfsset());
		if( $(document).scrollTop() > getArchiveScrollOfsset() && canBeLoaded == true && instyle_loadmore_params.current_page<instyle_loadmore_params.max_page){
			$.ajax({
				url : instyle_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					$('.instyle-archive-container').append( "<div class='ins-loader'><img src='https://instyle.mx/wp-content/themes/instylemx/images/loading.svg' alt='Loading...'></div>" );
					canBeLoaded = false; 
				},
				success:function(data){
					if( data ) {
						$('.ins-loader').remove();
						$('.instyle-archive-container').append( data ); // where to insert posts
						canBeLoaded = true; // the ajax is completed, now we can run it again

						var url=window.location.pathname;
						var uri='/page/'+instyle_loadmore_params.current_page+'/';
						if(instyle_loadmore_params.current_page>1) url=url.replace("page/"+(instyle_loadmore_params.current_page)+"/","");



						instyle_loadmore_params.current_page++;


						if ($('#ros-top-a-' + instyle_loadmore_params.current_page).length > 0 && $('#ros-top-a-' + instyle_loadmore_params.current_page).data('ad-loaded')!=1) {
						googletag.cmd.push(function() {
								var ros_top_a_more = googletag.sizeMapping().
								addSize([0, 0], [728, 90]).
								addSize([320, 0], [[320, 50], [320, 100]]). //Mobile
								addSize([1024, 200], [[970, 250],[970, 90],[728, 90]]). // Desktop
								build(); 
									adSlots['ros-top-a-'+instyle_loadmore_params.current_page] = googletag.defineSlot('/270959339/instyle-ros-t-a', [
										[320, 50], [970, 250], [728, 90], [970, 90], [320, 100]
									], 'ros-top-a-'+instyle_loadmore_params.current_page).defineSizeMapping(ros_top_a_more).addService(googletag.pubads());
									googletag.display('ros-top-a-' + instyle_loadmore_params.current_page);
							});
					//		console.log('#ros-top-a-' + instyle_loadmore_params.current_page +" loaded");
							$('#ros-top-a-' + instyle_loadmore_params.current_page).data('ad-loaded',1);
						}


						if ($('#ros-b-b-' + instyle_loadmore_params.current_page).length > 0 && $('#ros-b-b-' + instyle_loadmore_params.current_page).data('ad-loaded')!=1) {
							googletag.cmd.push(function() {
								var ros_box_b_more = googletag.sizeMapping().
								addSize([0, 0], [300, 250]).
								 addSize([320, 0], [[300, 250], [300, 600]]). //Mobile
									 build();
					 
										adSlots['ros-b-b-'+instyle_loadmore_params.current_page] = googletag.defineSlot('/270959339/instyle-ros-b-b', [
											[[300, 600], [300, 250]]
										], 'ros-b-b-'+instyle_loadmore_params.current_page).defineSizeMapping(ros_box_b_more).addService(googletag.pubads());
										googletag.display('ros-b-b-' + instyle_loadmore_params.current_page);
								});
						//		console.log('#ros-b-b-' + instyle_loadmore_params.current_page +" loaded");
								$('#ros-b-b-' + instyle_loadmore_params.current_page).data('ad-loaded',1);
							}

						if(checkWidth()>767){
						$('.masonry-bootstrap-page'+instyle_loadmore_params.current_page).masonry();
						} 

					}else{
						canBeLoaded = false;
					}
				}
			});
		}
	});

	var currentUri=window.location.pathname;

	$(document).on('scroll',function(e)
	{
		$('.archive-pagination').each(function()
		{
			if ( $(this).offset().top < window.pageYOffset + 10 
			&&   $(this).offset().top + 
				 $(this).height() > window.pageYOffset + 10
			   ) 
			{
			  var data = $(this).data('page');
			  if(!data){
			  data=1;
			  }
			    //if(data!=instyle_loadmore_params.current_page){
					var url=window.location.pathname;
					var uri=url.replace(/\/page\/[0-9]+/,'');
					if(data>1){
						uri = uri+'page/'+data+'/';
					}
					if(uri!=currentUri){
					history.pushState({page:data},'/page/'+data+'/',uri);
					//console.log("Cambia uri: "+uri);
					currentUri=uri;
					ga("set", "page", uri);
					ga("send", "pageview");
					ga("send", "event", "Scroll Pageview", uri);
					}
				//}
		//	  window.location.hash = data;
			}
		});
	});

});
*/