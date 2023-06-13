/*! For license information please see map-places.bundle.c00724110067b2de52cc.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,t,i){function u(e,n,o,l){return new(o=o||Promise)(function(i,t){function r(e){try{s(l.next(e))}catch(e){t(e)}}function a(e){try{s(l.throw(e))}catch(e){t(e)}}function s(e){var t;e.done?i(e.value):((t=e.value)instanceof o?t:new o(function(e){e(t)})).then(r,a)}s((l=l.apply(e,n||[])).next())})}i.r(t),i.d(t,{PlacesMap:function(){return a}});function g(e,t){if(e===t)return!0;if(e&&t&&"object"==typeof e&&"object"==typeof t){if(e.constructor!==t.constructor)return!1;var i,r,a;if(Array.isArray(e)){if((i=e.length)!=t.length)return!1;for(r=i;0!=r--;)if(!g(e[r],t[r]))return!1}else{if(e.constructor===RegExp)return e.source===t.source&&e.flags===t.flags;if(e.valueOf!==Object.prototype.valueOf)return e.valueOf()===t.valueOf();if(e.toString!==Object.prototype.toString)return e.toString()===t.toString();if((i=(a=Object.keys(e)).length)!==Object.keys(t).length)return!1;for(r=i;0!=r--;)if(!Object.prototype.hasOwnProperty.call(t,a[r]))return!1;for(r=i;0!=r--;){var s=a[r];if(!g(e[s],t[s]))return!1}}return!0}return e!=e&&t!=t}var r;const m="__googleMapsScriptId";(i=r=r||{})[i.INITIALIZED=0]="INITIALIZED",i[i.LOADING=1]="LOADING",i[i.SUCCESS=2]="SUCCESS",i[i.FAILURE=3]="FAILURE";class v{constructor({apiKey:e,authReferrerPolicy:t,channel:i,client:r,id:a=m,language:s,libraries:n=[],mapIds:o,nonce:l,region:c,retries:h=3,url:p="https://maps.googleapis.com/maps/api/js",version:d}){if(this.callbacks=[],this.done=!1,this.loading=!1,this.errors=[],this.apiKey=e,this.authReferrerPolicy=t,this.channel=i,this.client=r,this.id=a||m,this.language=s,this.libraries=n,this.mapIds=o,this.nonce=l,this.region=c,this.retries=h,this.url=p,this.version=d,v.instance){if(g(this.options,v.instance.options))return v.instance;throw new Error(`Loader must not be called again with different options. ${JSON.stringify(this.options)} !== `+JSON.stringify(v.instance.options))}v.instance=this}get options(){return{version:this.version,apiKey:this.apiKey,channel:this.channel,client:this.client,id:this.id,libraries:this.libraries,language:this.language,region:this.region,mapIds:this.mapIds,nonce:this.nonce,url:this.url,authReferrerPolicy:this.authReferrerPolicy}}get status(){return this.errors.length?r.FAILURE:this.done?r.SUCCESS:this.loading?r.LOADING:r.INITIALIZED}get failed(){return this.done&&!this.loading&&this.errors.length>=this.retries+1}createUrl(){let e=this.url;return e+="?callback=__googleMapsCallback",this.apiKey&&(e+="&key="+this.apiKey),this.channel&&(e+="&channel="+this.channel),this.client&&(e+="&client="+this.client),0<this.libraries.length&&(e+="&libraries="+this.libraries.join(",")),this.language&&(e+="&language="+this.language),this.region&&(e+="&region="+this.region),this.version&&(e+="&v="+this.version),this.mapIds&&(e+="&map_ids="+this.mapIds.join(",")),this.authReferrerPolicy&&(e+="&auth_referrer_policy="+this.authReferrerPolicy),e}deleteScript(){var e=document.getElementById(this.id);e&&e.remove()}load(){return this.loadPromise()}loadPromise(){return new Promise((t,i)=>{this.loadCallback(e=>{e?i(e.error):t(window.google)})})}importLibrary(e){return this.execute(),google.maps.importLibrary(e)}loadCallback(e){this.callbacks.push(e),this.execute()}setScript(){var e;if(document.getElementById(this.id))this.callback();else{const t={key:this.apiKey,channel:this.channel,client:this.client,libraries:this.libraries,v:this.version,mapIds:this.mapIds,language:this.language,region:this.region,authReferrerPolicy:this.authReferrerPolicy};if(Object.keys(t).forEach(e=>!t[e]&&delete t[e]),null==(e=null==(e=null===window||void 0===window?void 0:window.google)?void 0:e.maps)||!e.importLibrary){var c=t;let r,a,s,n="The Google Maps JavaScript API",o="google",i="importLibrary",l=document,e=window;const h=(e=e[o]||(e[o]={})).maps||(e.maps={}),p=new Set,d=new URLSearchParams,g=()=>r=r||new Promise((t,i)=>u(this,void 0,void 0,function*(){var e;for(s in yield a=l.createElement("script"),a.id=this.id,d.set("libraries",[...p]+""),c)d.set(s.replace(/[A-Z]/g,e=>"_"+e[0].toLowerCase()),c[s]);d.set("callback",o+".maps.__ib__"),a.src=this.url+"?"+d,h.__ib__=t,a.onerror=()=>r=i(Error(n+" could not load.")),a.nonce=this.nonce||(null==(e=l.querySelector("script[nonce]"))?void 0:e.nonce)||"",l.head.append(a)}));h[i]?console.warn(n+" only loads once. Ignoring:",c):h[i]=(e,...t)=>p.add(e)&&g().then(()=>h[i](e,...t))}this.importLibrary("core").then(()=>this.callback(),e=>{e=new ErrorEvent("error",{error:e});this.loadErrorCallback(e)})}}reset(){this.deleteScript(),this.done=!1,this.loading=!1,this.errors=[],this.onerrorEvent=null}resetIfRetryingFailed(){this.failed&&this.reset()}loadErrorCallback(e){var t;this.errors.push(e),this.errors.length<=this.retries?(t=this.errors.length*Math.pow(2,this.errors.length),console.error(`Failed to load Google Maps script, retrying in ${t} ms.`),setTimeout(()=>{this.deleteScript(),this.setScript()},t)):(this.onerrorEvent=e,this.callback())}callback(){this.done=!0,this.loading=!1,this.callbacks.forEach(e=>{e(this.onerrorEvent)}),this.callbacks=[]}execute(){this.resetIfRetryingFailed(),this.done?this.callback():window.google&&window.google.maps&&window.google.maps.version?(console.warn("Google Maps already loaded outside @googlemaps/js-api-loader.This may result in undesirable behavior as options and script parameters may not match."),this.callback()):this.loading||(this.loading=!0,this.setScript())}}const a=(()=>{let i=0,r="",a="";const l={};let c={};let h=!1;var e=ThemeSetupDos.themeUri;const p=ThemeSetupDos.maps.marker||e+"/assets/images/marker.png",s=ThemeSetupDos.maps.markerActive||e+"/assets/images/marker.png",t=ThemeSetupDos.maps.api||"";let d=ThemeSetupDos.maps.center||{lat:19.4326018,lng:-99.1332049};const g=parseInt(ThemeSetupDos.maps.zoom)||13;const n=e=>e.querySelectorAll("[data-place-id]"),o=(e,t,i)=>{e=`
    <div class="widget wa_maps_widget">
        <h3 class="widget-title">${e}</h3>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);i.prepend(t)},u=(n,o)=>{var e=new v({apiKey:t,version:"weekly"});const i={center:d,zoom:g,styles:[{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit",stylers:[{visibility:"off"}]}],mapTypeControl:!1,streetViewControl:!1};e.load().then(e=>{var t=new e.maps.Map(document.getElementById("map-container-"+n),i);l[n]=t,e.maps.event.addListener(t,"idle",()=>{if(!h){h=!0;{var a=n,s=o;let e=document.getElementById("map-widget-"+a),t="",i=e.querySelector(".map-places-container"),r=(s.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=m(e),f(e,a)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${a}">
    ${t}
    </ul>
    `);s=document.createRange().createContextualFragment(r);console.log(i),i.appendChild(s)}}}),console.log("Map loaded")}).catch(e=>{})},m=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},f=(e,i)=>{var t=e.latitud,r=e.longitud;const a=l[i];document.getElementById("map-places-container-"+i);var s=`

        <h4 class="location-item-title">${e.title}</h4>

    `;const n=new google.maps.InfoWindow({content:s}),o=(console.log(t,r),new google.maps.Marker({position:{lat:t,lng:r},visible:!0,map:l[i],title:e.title||"",icon:{url:p,scaledSize:new google.maps.Size(47,65)},infowindow:n}));n.addListener("closeclick",()=>{y(o,!1)}),o.addListener("click",()=>{{var e=i;const t=l[e];Object.entries(c).forEach(([,e])=>{e.infowindow.close(t,e),y(e,!1)})}y(o,!0),n.open({anchor:o,map:l[i],shouldFocus:!1}),a.getZoom()<14&&a.setZoom(14)}),c[e.id]=o},y=(e,t)=>{t?e.setIcon({url:s,scaledSize:new google.maps.Size(47,65)}):e.setIcon({url:p,scaledSize:new google.maps.Size(47,65)})};return{init:()=>{console.log("Inicializando mapa de lugares",i);var e=i=ThemeSetupDos.currentID||0;{var t;r=document.getElementById("post-"+e),a=r?r.querySelector(".single-widget-area"):null,r&&(0<[...t=n(r)].length&&(o("Prueba mapa",e,a),u(e,[...t])))}}}})()}}]);