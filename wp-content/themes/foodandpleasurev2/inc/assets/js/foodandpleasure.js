/**
 * Lazyframe
 */
(function (w, d) {
  var b = d.getElementsByTagName('body')[0];
  var s = d.createElement('script');
  var v = !('IntersectionObserver' in w) ? '8.15.0' : '10.17.0';
  s.async = true;
  s.src =
    'https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.0/dist/lazyload.min.js';
  //s.src = "https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/" + v + "/lazyload.min.js";
  w.lazyLoadOptions = { elements_selector: '.lazy-wa', threshold: '20' };
  b.appendChild(s);
  w.addEventListener(
    'LazyLoad::Initialized',
    function (event) {
      w.lazyLoadInstance = event.detail.instance;
    },
    false
  );
})(window, document);

function displayInstagramGrid(target) {
  let user = target.dataset.user;
  let items = target.dataset.items ? target.dataset.items : 12;
  let el = target.dataset.selector
    ? document.querySelector(target.dataset.selector)
    : target;
  const access_token =
    'IGQVJVTEtXNHhjZAzFCa25kc3FxLU1QdmRfdVpId3J3NXV3a1FiSU9fY0owSkNfRmZAhUVYwbGtocVlrQ3lMSmQ1ck1tUzlWMk14dzk5NTRtZA0xtTDdlRElhQTRha2lsQk9ZAUXVvUnd6ZAVNvNGZAwRkFuOAZDZD';

  console.log('Display Instagram Grid');

  var instagramJSON =
    'https://graph.instagram.com/me/media?fields=caption,media_url,media_type,permalink,timestamp,username&access_token=' +
    access_token;
  var data = sessionStorage.getItem(user + '_ig_datav2');

  if (data) {
    console.log('Instagram Cache');
    data = JSON.parse(data);

    data.data.forEach(function (item) {
      el.innerHTML = el.innerHTML + instagramItemTemplate(item);
    });
  } else {
    fetch(instagramJSON)
      .then(response => response.json())
      .then(data => {
        // Here's a list of repos!
        //console.log(data)
        sessionStorage.setItem(user + '_ig_datav2', JSON.stringify(data));

        data.data.forEach(function (item) {
          el.innerHTML = el.innerHTML + instagramItemTemplate(item);
        });
      });
  }
}

const instagramItemTemplate = item => {
  var template = '';

  template =
    '<article class="top-article"><div class="post-thumbnail"><a href="' +
    item.permalink +
    '" rel="nofollow noopener" target="_blank" data-src="' +
    item.permalink +
    '">';
  //console.log(item.media_type);
  if (item.media_type == 'VIDEO') {
    template =
      template +
      '<video src="' +
      item.media_url +
      '"  alt="' +
      item.caption +
      '" title="' +
      item.caption +
      '" style="width:100%;height:100%;object-fit:cover;" controls/>';
  } else {
    template =
      template +
      '<img src="' +
      item.media_url +
      '"  alt="' +
      item.caption +
      '" title="' +
      item.caption +
      '"/>';
  }

  template = template + '</a></div></article>';

  return template;
};

const callbackRouter = (entries, observer) =>
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      let target = entry.target;
      console.log('Loading: ' + target.dataset.element);
      if (target.dataset.callback) {
        window[target.dataset.callback](target);
      }
      observer.unobserve(entry.target);
    }
  });
const callbackObserver = new IntersectionObserver(callbackRouter, {
  rootMargin: '0px 0px 200px 0px',
});

document
  .querySelectorAll('.lazy-callback')
  .forEach(lazyElement => callbackObserver.observe(lazyElement));

var myLocalStorage = {
  get: function (key) {
    var value = localStorage[key];
    if (value != null) {
      var model = JSON.parse(value);
      if (model.payload != null && model.expiry != null) {
        var now = new Date();
        if (now > Date.parse(model.expiry)) {
          localStorage.removeItem(key);
          return null;
        }
      }
      return JSON.parse(value).payload;
    }
    return null;
  },
  set: function (key, value, expirySeconds) {
    var expiryDate = new Date();
    expiryDate.setSeconds(expiryDate.getSeconds() + expirySeconds);
    localStorage[key] = JSON.stringify({
      payload: value,
      expiry: expiryDate,
    });
  },
};

function getPostConfig(postID) {
  return document.getElementById('post-' + postID).dataset.meta;
}

/**
 * Social Share
 */

(function () {
  // link selector and pop-up window size
  var Config = {
    Link: 'a.share-link',
    Width: 500,
    Height: 500,
  };
  // add handler links
  var slink = document.querySelectorAll(Config.Link);
  for (var a = 0; a < slink.length; a++) {
    slink[a].onclick = PopupHandler;
  }
  // create popup
  function PopupHandler(e) {
    e = e ? e : window.event;
    var t = e.target ? e.target : e.srcElement;
    // popup position
    var px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
      py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
    // open popup
    var popup = window.open(
      t.closest('a').href,
      'social',
      'width=' +
        Config.Width +
        ',height=' +
        Config.Height +
        ',left=' +
        px +
        ',top=' +
        py +
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1'
    );
    if (popup) {
      popup.focus();
      if (e.preventDefault) e.preventDefault();
      e.returnValue = false;
    }
    return !!popup;
  }
})();

/**
 * Load
 */
const body = document.body;
const nav = document.querySelector('#masthead nav');
const stickyHeader = document.getElementById('masthead');
const scrollUp = 'scroll-up';
const scrollDown = 'scroll-down';
let lastScroll = 0;
let scriptsLoaded = false;

window.addEventListener('scroll', function (ev) {
  const scrollTop =
    window.pageYOffset ||
    document.documentElement.scrollTop ||
    document.body.scrollTop ||
    0;
  const currentScroll = window.pageYOffset;
  //const stickyHeader = document.getElementById("masthead");

  //console.log(stickyHeader.offsetHeight);
  //console.log(scrollTop);stickyHeader.offsetHeight

  if (currentScroll == 0) {
    body.classList.remove(scrollUp);
    body.classList.remove(scrollDown);
    return;
  }

  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);

    // stickyHeader.style.top = "-"+(stickyPreNav.offsetHeight+36)+"px";
  }
  lastScroll = currentScroll;

  if (scrollTop > stickyHeader.offsetHeight) {
    //stickyHeader.classList.add("isSticky");

    //console.log(stickyHeader.offsetHeight);

    document
      .querySelectorAll('.sticky-header')
      .forEach(
        stickyHeaderElement =>
          (stickyHeaderElement.style.top = stickyHeader.offsetHeight + 'px')
      );
  } else {
    // stickyHeader.classList.remove("isSticky");
  }

  if (scrollTop > 5) {
    if (!scriptsLoaded) {
      if (is_single) {
        loadSocialScripts();

/*        window._seedtagq = window._seedtagq || [];
        window._seedtagq.push(['_setId', '3100-3594-01']);
        (function () {
          var st = document.createElement('script');
          st.type = 'text/javascript';
          st.async = true;
          st.src =
            ('https:' == document.location.protocol ? 'https' : 'http') +
            '://config.seedtag.com/loader.js?v=' +
            Math.random();
          var s = document.getElementsByTagName('script')[0];
          if (s !== null) s.parentNode.insertBefore(st, s);
        })();

        console.log('Insertando Seedtag');*/
      }
      if (typeof googletag == 'object') {
        googletag.pubads().refresh();
      }

      /* (function () {      
							var st = document.createElement('script');      
							st.type = 'text/javascript';      
							st.async = true;      
							st.src = 'https://www5.smartadserver.com/ac?out=js&nwid=1204&siteid=369103&pgname=_home&fmtid=52013&tgt=[sas_target]&visit=m&tmstp='+Math.random()+'&clcturl=[countgo]';    
							var s = document.querySelector('#mosaic-container');
							if(s)      
							s.appendChild(st);    
					 	 })();  
						  */

      //	console.log("Insertar Mosaic");

      scriptsLoaded = true;
    }
  }
});

if (window.is_single) {
  var postConfig = JSON.parse(getPostConfig(window.postID));

  if (Array.isArray(postConfig.canal)) {
    postConfig.canal.forEach(function (item, index) {
      ga(
        'send',
        'event',
        'Pageviews por canal',
        item,
        jQuery('#post-' + window.postID).data('slug')
      );
      //console.log("Pageview: "+item);
    });
  }

  enableInRead(window.activeID);
  enableSingleBanners(window.activeID);
}

function enableInRead(postID) {
  let parrafos = document.querySelectorAll(
    '#post-' + postID + ' .entry-txt > p'
  );
  if (parrafos.length >= 1)
    parrafos[1].insertAdjacentHTML(
      'afterend',
      '<div id="inread-' + postID + '"  class="food-inread ad-container"></div>'
    );
}

function enableSingleBanners(PID) {
  if (typeof googletag == 'object') {
    //INREAD

    /*
      slots['inread']=googletag.defineSlot('/1026310/FoodAndPleasure/inread',[[1, 1], [300, 250]], 'div-gpt-ad-1554934136881-0').defineSizeMapping(ros_inread).addService(googletag.pubads());

		*/

    googletag.cmd.push(function () {
      var single_Inread = googletag
        .sizeMapping()
        .addSize([0, 0], [[1, 1], 'fluid', [300, 250]])
        .addSize([320, 0], [[1, 1], [300, 250], [300, 600], 'fluid']) //Mobile
        .addSize([1024, 200], [[1, 1], 'fluid', [300, 250]]) // Desktop
        .build();

      slots['inread-' + PID] = googletag
        .defineSlot(
          '/1026310/FoodAndPleasure/inread',
          [[1, 1], 'fluid', [300, 250], [300, 600]],
          'inread-' + PID
        )
        .defineSizeMapping(single_Inread)
        .addService(googletag.pubads())
        .setTargeting('canal', postConfig.canal)
        .setTargeting('postID', PID)
        .setTargeting('tags', postConfig.tags)
        .setTargeting('single', 'true')
        .setTargeting('url', window.location.pathname)
        .setTargeting('referrer', document.referrer.split('/')[2]);

      googletag.display('inread-' + PID);
    });

    /**
 * VIDEO WALL
 *       slots['VideoWall']=googletag.defineSlot('/1026310/FoodAndPleasure/VideoWall', [[300, 250], [300, 600]], 'div-gpt-ad-1565377299902-0').defineSizeMapping(ros_box_a).addService(googletag.pubads());

 */

    googletag.cmd.push(function () {
      var single_ros_box_a = googletag
        .sizeMapping()
        .addSize([0, 0], [300, 250])
        .addSize(
          [320, 0],
          [
            [300, 250],
            [300, 600],
          ]
        ) //Mobile
        .addSize(
          [1024, 200],
          [
            [300, 250],
            [300, 600],
          ]
        ) // Desktop
        .build();

      slots['VideoWall-' + PID] = googletag
        .defineSlot(
          '/1026310/FoodAndPleasure/VideoWall',
          [
            [300, 250],
            [300, 600],
          ],
          'videowall-' + PID
        )
        .defineSizeMapping(single_ros_box_a)
        .addService(googletag.pubads())
        .setTargeting('canal', postConfig.canal)
        .setTargeting('postID', PID)
        .setTargeting('tags', postConfig.tags)
        .setTargeting('single', 'true')
        .setTargeting('url', window.location.pathname)
        .setTargeting('referrer', document.referrer.split('/')[2]);

      googletag.display('videowall-' + PID);
    });
  }
}

function loadSocialScripts(container) {
  if (typeof container == 'undefined') {
    container = jQuery(document);
  }

  if (is_single || is_especial) {
    if (jQuery('.instagram-media', container).length > 0) {
      //Instagram
      if (undefined === window.instgrm) {
        console.log('Load Instagram JS');
        jQuery.ajaxSetup({ cache: true });
        jQuery.getScript(
          '//platform.instagram.com/en_US/embeds.js',
          function () {
            window.instgrm.Embeds.process();
          }
        );
      } else {
        window.instgrm.Embeds.process();
      }
    }

    //PINTEREST
    if (jQuery('a[data-pin-do]').length > 0) {
      //Instagram
      (function (w, d) {
        if (!w.hazPinIt) {
          console.log('Load Pinterest JS');

          w.hazPinIt = true;
          var s = d.createElement('SCRIPT');
          s.src = '//assets.pinterest.com/js/pinit.js';
          s.type = 'text/javascript';
          s.setAttribute('data-pin-build', 'parsePins');
          d.body.appendChild(s);
          window.parsePins();
        }
      })(window, document);
    }

    //Twitter
    if (jQuery('.twitter-tweet', container).length > 0) {
      if (typeof twttr != 'undefined') {
        twttr.widgets.load();
      } else {
        console.log('Load Twitter JS');
        jQuery.ajaxSetup({ cache: true });
        jQuery.getScript(
          'https://platform.twitter.com/widgets.js',
          function () {
            twttr.widgets.load();
          }
        );
      }
    }

    //Facebook
    if (jQuery('.fb-post', container).length > 0) {
      if (typeof FB != 'undefined') {
        try {
          FB.init({ status: true, cookie: true, xfbml: true });
          FB.XFBML.parse();
        } catch (ex) {}
      } else {
        console.log('Load FB JS');
        jQuery.ajaxSetup({ cache: true });
        jQuery.getScript(
          'https://connect.facebook.net/en_US/all.js#xfbml=1',
          function () {
            FB.init({ status: true, cookie: true, xfbml: true });
            FB.XFBML.parse();
          }
        );
      }
    }
  }
}

const Site = (() => {
  const baseURI = window.location.hostname;
  let scrollExecuted = false;
  let DMP;

  const init = () => {
    window.addEventListener('scroll', checkScrollToLoadScripts);
    window.addEventListener('mousemove', checkScrollToLoadScripts);
    window.addEventListener('touchmove', checkScrollToLoadScripts);
  };

  const checkScrollToLoadScripts = () => {
    // const scrollTop =
    //   window.pageYOffset ||
    //   document.documentElement.scrollTop ||
    //   document.body.scrollTop ||
    //   0;
    //   (scrollTop > 3) &

    if (!scrollExecuted) {
      window.removeEventListener('scroll', checkScrollToLoadScripts);
      window.removeEventListener('mousemove', checkScrollToLoadScripts);
      window.removeEventListener('touchmove', checkScrollToLoadScripts);

      executeOnScroll();
      scrollExecuted = true;
    }
  };

  const executeOnScroll = () => {
    loadLCP();
  };

  const loadLCP = () => {
    const lcp = document.querySelector('[data-lcp-src]');
    if (lcp) {
      lcp.src = lcp.dataset.lcpSrc;
      lcp.dataset.lcpLoaded = true;
    }
  };

  return {
    init: init,
  };
})();

Site.init();
