jQuery(function($){
	let canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 1500; // the distance (in px) from the page bottom when you want to load more posts
	let oldurl="";
	
  function getSingleScrollOfsset(){
		return ($('.articles-container').height() - ($('.articles-container').height() / 2));//- bottomOffset;
	}
 
	let isPromoted = false;
	let articlePromoted = "undefined";
    let nextArticle="undefined";

	$(window).scroll(function(){

	//	console.log("Scroll: "+$(document).scrollTop()+ "Validation: "+ getSingleScrollOfsset());


		if( $(document).scrollTop() > getSingleScrollOfsset() && canBeLoaded == true && food_loadmore.next.length>0){

            //console.log(food_loadmore.next);
            
            var data = {
                'loadpost':'1',
                'action': 'loadmorepost',    
            };


			articlePromoted = food_loadmore.promote.shift();
			isPromoted = false;
 
			if(typeof articlePromoted!="undefined") {
				data.postid = articlePromoted;
				isPromoted=true;
			}else{
                nextArticle = food_loadmore.next.shift();
                if(typeof nextArticle!="undefined") {
                    data.postid = nextArticle;
                }
            }

            //console.log(data);
            //console.log(food_loadmore.next);

            food_loadmore.current = data.postid;

			$.ajax({
				url : food_config.ajaxurl,
				data:data,
				type:'GET',
				beforeSend: function( xhr ){
					console.log("Carga nuevo contenido");
					$('.articles-container').append( ' <div class="text-center loader my-5"><div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div></div>' );
					canBeLoaded = false; 
				},
				success:function(data){
					if( data ) {
						$('.loader').remove();
						$('.articles-container').append( data ); // where to insert posts

						
					var curID=food_loadmore.current;

					food_loadmore.previous_ids.push(parseInt(food_loadmore.current));



					$( document.body ).trigger( 'post-load' );
					var bodyEl = document.querySelector( 'body' );
					let event = new Event("is.post-load");
					bodyEl.dispatchEvent(event);

					enableInRead(curID);
					enableSingleBanners(curID);
					//determineSticky();
					loadSocialScripts(document.getElementById(curID));
					if (typeof window.lazyLoadInstance !="undefined") {
						window.lazyLoadInstance.update();
					}
										

					}else{
						canBeLoaded = false;
					}
				}
			});
		}
	});

	var currentUri=window.location.pathname;
	var currentScroll=0;

	$(document).on('scroll',function(e)
	{		

		function getArticleHeight(element){
			var height = $(element).height();
			return height;
		}

		function getArticleMiddle(element, banner){
			var  alto = getArticleHeight(element)/2;
			var top = $(element).offset().top;
			return (alto+top)-banner;
		}

		function getAllWidgetsHeight(elements){
		
			var outerHeight = 0;
			$(elements).each(function() {
			  outerHeight += $(this).outerHeight();
			});

			return outerHeight;
		}

		$('article.post').each(function()
		{
			if ( $(this).offset().top < window.pageYOffset + 10 
			&&   $(this).offset().top + 
				 $(this).height() > window.pageYOffset + 10
			   ) 
			{
					var data = $(this).data('slug');
					var nextPost = $(this).data('next');
					var previousPost = $(this).data('previous');
					var pageTitle=$(this).data('seo-title');;
					var currentPost = $(this).data('post-id');
					
					//console.log(currentPost);

					var uri=window.location.pathname;
					window.activeID = currentPost;
					
					if(data!=currentUri){

						//if(window.showNewsLetterForm){
						//}

					canBeLoaded = true; // the ajax is completed, now we can run it again

					//pageTitle= $('h1.entry-title',this).text();
                    console.log("Title: "+pageTitle);

					history.pushState({url:window.location.href,title:pageTitle,page:data},pageTitle,data);
					currentUri=data;
					document.title = pageTitle;


						if(typeof previousPost!="undefined"){
						//	console.log("Previous: "+previousPost);
						//	refreshPostsSlots(previousPost);
						}
						if(typeof nextPost!="undefined"){
						//	refreshPostsSlots(nextPost);
						//	console.log("Next: "+nextPost);
						}

						if(typeof googletag=="object"){
							googletag.pubads().refresh();
						}
					
						var postConfig = JSON.parse(getPostConfig(currentPost));

				  	    ga("set", "page", data);
						ga("send", "pageview");
						ga("send", "event", "Scroll Post Pageview", data);

						if(Array.isArray(postConfig.canal)){
							postConfig.canal.forEach(function(item,index){
								ga('send', 'event', 'Pageviews por canal', item, data);
							});
						}


//Jetpack


						if($('#wpstats').length > 0){
						/*
						<img src="https://pixel.wp.com/g.gif?v=ext&amp;j=1%3A9.5&amp;blog=140992035&amp;post=35349&amp;tz=-6&amp;srv=foodandpleasure.com&amp;host=foodandpleasure.com&amp;ref=https%3A%2F%2Ffoodandpleasure.com%2Frincones-secretos-queretaro%2F&amp;fcp=327&amp;rand=0.5714384365286052" alt=":)" width="6" height="5" id="wpstats">
						*/
						var pixelsrc=document.location.protocol + '//pixel.wp.com/g.gif'+'?v=ext&j=1%3A9.5&blog=140992035&post=' + $(this).data('post-id') + '&tz=-6&srv='+encodeURIComponent(window.location.hostname)+'&host='+encodeURIComponent(window.location.host)+'&ref='+encodeURIComponent(document.referrer)+'&rand=' + Math.random();
						//https://pixel.wp.com/g.gif?v=ext&j=1%3A7.3.1&blog=124272801&post=2586&tz=-5&srv=instyle.mx&host=instyle.mx&ref=https%3A%2F%2Finstyle.mx%2Fmoda%2Fgirl-power-ropa%2F&fcp=2567&rand=0.9263097370057745
						//console.log(pixelsrc);
						//<img src="https://pixel.wp.com/g.gif?v=ext&amp;j=1%3A8.7.1&amp;blog=166987949&amp;post=338&amp;tz=-5&amp;srv=wokii.com&amp;host=wokii.com&amp;ref=&amp;fcp=852&amp;rand=0.05039285493501788" alt=":)" width="6" height="5" id="wpstats">
						$('#wpstats').attr('src',pixelsrc);
					   }


					}
			}
		});

	});

});
