"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/leaflet-places.js":function(e,t,a){a.r(t),a.d(t,{PlacesMap:function(){return s}});a("../node_modules/@googlemaps/js-api-loader/dist/index.esm.js");var t=a("../node_modules/leaflet/dist/leaflet-src.js"),p=a.n(t);const s=(()=>{let e;const s={};var t=WA_ThemeSetup.themeUri;WA_ThemeSetup.maps.marker,WA_ThemeSetup.maps.markerActive;WA_ThemeSetup.maps.api,WA_ThemeSetup.maps.center,parseInt(WA_ThemeSetup.maps.zoom);const i=WA_ThemeSetup.maps.map_category??"maps";const a=e=>{var t,a=document.getElementById("post-"+e),s=c(e);a&&a.classList.contains("category-"+i)&&(t=a.querySelector("h1").innerText,0<[...a=n(a)].length)&&(d(t,e,s),o(e,[...a]),r())},n=e=>e.querySelectorAll("[data-place-id]"),d=(e,t,a)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${r()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);r()?a.after(t):a.prepend(t)},r=()=>{return window.matchMedia("(max-width: 991px)").matches},c=e=>{e=document.getElementById("post-"+e);return r()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const o=(e,t)=>{var a=p().map("map-container-"+e).setView([51.505,-.09],13);(s[e]=a).on("load",function(){console.log("El mapa se ha cargado completamente")})};return{init:()=>{e=WA_ThemeSetup.currentID||0,a(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,a(e.detail.postID))})}}})()}}]);