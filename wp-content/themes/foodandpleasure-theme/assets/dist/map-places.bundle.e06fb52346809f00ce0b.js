"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/leaflet-places.js":function(e,t,a){a.r(t),a.d(t,{PlacesMap:function(){return i}});a("../node_modules/@googlemaps/js-api-loader/dist/index.esm.js");var t=a("../node_modules/leaflet/dist/leaflet-src.js"),k=a.n(t);const i=(()=>{let e;const d={},p={};let t=!1,o=!1;var a=WA_ThemeSetup.themeUri,i=WA_ThemeSetup.maps.marker||a+"/assets/images/marker.png",a=WA_ThemeSetup.maps.markerActive||a+"/assets/images/marker.png";WA_ThemeSetup.maps.api;let l=WA_ThemeSetup.maps.center||{lat:19.4326018,lng:-99.1332049};const c=parseInt(WA_ThemeSetup.maps.zoom)||13,s=WA_ThemeSetup.maps.map_category??"maps",n=k().icon({iconUrl:i,iconSize:[35,48]}),r=k().icon({iconUrl:a,iconSize:[35,48]});const m=e=>{var t,a=document.getElementById("post-"+e),i=v(e);a&&a.classList.contains("category-"+s)&&(t=a.querySelector("h1").innerText,0<[...a=u(a)].length)&&(g(t,e,i),y(e,[...a]),h())},u=e=>e.querySelectorAll("[data-place-id]"),g=(e,t,a)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${h()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);h()?a.after(t):a.prepend(t)},h=()=>{return window.matchMedia("(max-width: 991px)").matches},v=e=>{e=document.getElementById("post-"+e);return h()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const y=(o,r)=>{var e=k().map("map-container-"+o);(d[o]=e).on("load",function(){if(console.log("El mapa se ha cargado completamente"),!t){t=!0;{var c=o,s=r;let e=document.getElementById("map-widget-"+c),t="",a=e.querySelector(".map-places-container");p[c]={};const n=d[c];let i=!0,l=(s.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=w(e),S(e,c),i&&(n.setView({lat:e.latitud,lng:e.longitud}),i=!1)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${c}">
    ${t}
    </ul>
    `);s=document.createRange().createContextualFragment(l);a.appendChild(s),document.querySelectorAll(`#map-places-list-${c} > li`).forEach(a=>{a.addEventListener("click",e=>{var t={id:a.dataset.placeId};I(c,t,!0)})})}}}),e.setView([l.lat,l.lng],c),k().tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png",{maxZoom:19,attribution:'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(e)},w=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},S=(e,t)=>{var a=e.latitud,i=e.longitud,l=d[t],c=(document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),a=k().marker([a,i],{icon:n}).addTo(l).bindPopup(c);a.on("click",()=>{I(t,e,!0)}),p[t][e.id]=a},I=(e,t,a=!1,i=!1)=>{var l=document.getElementById("map-places-container-"+e),c=document.getElementById("post-"+e),s=d[e],n=p[e][t.id];_(e,t)||(E(e),f(n,!0),n.openPopup(),s.getZoom()<17&&s.setZoom(17),s.setView(n.getLatLng()),h()||l.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),$(c),l.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),i||h()||c.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),a&&(o=!0,c.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},$=e=>{[...u(e)].forEach(e=>{e.classList.remove("active")})},_=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},f=(e,t)=>{t?e.setIcon(r):e.setIcon(n)},E=e=>{d[e];Object.entries(p[e]).forEach(([,e])=>{f(e,!1)})};return{init:()=>{e=WA_ThemeSetup.currentID||0,m(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,m(e.detail.postID))})}}})()}}]);