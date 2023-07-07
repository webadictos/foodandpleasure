"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/leaflet-places.js":function(e,t,a){a.r(t),a.d(t,{PlacesMap:function(){return l}});a("../node_modules/@googlemaps/js-api-loader/dist/index.esm.js");var t=a("../node_modules/leaflet/dist/leaflet-src.js"),I=a.n(t);const l=(()=>{let e;const r={},p={};let t=!1,o=!1;var a=WA_ThemeSetup.themeUri;WA_ThemeSetup.maps.marker,WA_ThemeSetup.maps.markerActive,WA_ThemeSetup.maps.api;let l=WA_ThemeSetup.maps.center||{lat:19.4326018,lng:-99.1332049};const i=parseInt(WA_ThemeSetup.maps.zoom)||13,c=WA_ThemeSetup.maps.map_category??"maps";const s=e=>{var t,a=document.getElementById("post-"+e),l=u(e);a&&a.classList.contains("category-"+c)&&(t=a.querySelector("h1").innerText,0<[...a=d(a)].length)&&(n(t,e,l),g(e,[...a]),m())},d=e=>e.querySelectorAll("[data-place-id]"),n=(e,t,a)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${m()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);m()?a.after(t):a.prepend(t)},m=()=>{return window.matchMedia("(max-width: 991px)").matches},u=e=>{e=document.getElementById("post-"+e);return m()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const g=(o,n)=>{var e=I().map("map-container-"+o);(r[o]=e).on("load",function(){if(console.log("El mapa se ha cargado completamente"),!t){t=!0;{var c=o,s=n;let e=document.getElementById("map-widget-"+c),t="",a=e.querySelector(".map-places-container");p[c]={};const d=r[c];let l=!0,i=(s.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=h(e),v(e,c),l&&(d.setView({lat:e.latitud,lng:e.longitud}),l=!1)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${c}">
    ${t}
    </ul>
    `);s=document.createRange().createContextualFragment(i);a.appendChild(s),document.querySelectorAll(`#map-places-list-${c} > li`).forEach(a=>{a.addEventListener("click",e=>{var t={id:a.dataset.placeId};y(c,t,!0)})})}}}),e.setView([l.lat,l.lng],i),I().tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png",{maxZoom:19,attribution:'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(e)},h=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},v=(e,t)=>{var a=e.latitud,l=e.longitud,i=r[t],c=(document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),a=I().marker([a,l]).addTo(i).bindPopup(c);a.on("click",()=>{y(t,e,!0)}),p[t][e.id]=a},y=(e,t,a=!1,l=!1)=>{var i=document.getElementById("map-places-container-"+e),c=document.getElementById("post-"+e),s=r[e],d=p[e][t.id];S(e,t)||(_(e),$(d,!0),d.openPopup(),s.getZoom()<14&&s.setZoom(14),s.setView(d.getLatLng()),m()||i.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),w(c),i.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),l||m()||c.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),a&&(o=!0,c.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},w=e=>{[...d(e)].forEach(e=>{e.classList.remove("active")})},S=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},$=(e,t)=>{},_=e=>{};return{init:()=>{e=WA_ThemeSetup.currentID||0,s(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,s(e.detail.postID))})}}})()}}]);