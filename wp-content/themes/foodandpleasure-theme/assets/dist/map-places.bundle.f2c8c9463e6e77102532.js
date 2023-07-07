"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/leaflet-places.js":function(e,t,a){a.r(t),a.d(t,{PlacesMap:function(){return i}});a("../node_modules/@googlemaps/js-api-loader/dist/index.esm.js");var t=a("../node_modules/leaflet/dist/leaflet-src.js"),b=a.n(t);const i=(()=>{let e;const m={},u={};let r=!1;var t=WA_ThemeSetup.themeUri,a=WA_ThemeSetup.maps.marker||t+"/assets/images/marker.png",t=WA_ThemeSetup.maps.markerActive||t+"/assets/images/marker.png";WA_ThemeSetup.maps.api;let i=WA_ThemeSetup.maps.center||{lat:19.4326018,lng:-99.1332049};const l=parseInt(WA_ThemeSetup.maps.zoom)||13,s=WA_ThemeSetup.maps.map_category??"maps",n=b().icon({iconUrl:a,iconSize:[35,48]}),c=b().icon({iconUrl:t,iconSize:[35,48]});const o=e=>{var t,a=document.getElementById("post-"+e),i=h(e);a&&a.classList.contains("category-"+s)&&(t=a.querySelector("h1").innerText,0<[...a=d(a)].length)&&(p(t,e,i),y(e,[...a]),g()||v(a,e))},d=e=>e.querySelectorAll("[data-place-id]"),p=(e,t,a)=>{e=`
    <div id="wa-maps-widget-${t}" class="widget wa_maps_widget ${g()?"is-mobile":""}">
    <div class="widget-header">
        <h3 class="widget-title">${e}</h3>
    </div>
        <div id="map-widget-${t}" class="map-widget" data-map-id="${t}">
            <div id="map-container-${t}" class="map-container"></div>
            <div id="map-places-container-${t}" class="map-places-container"></div>
        </div>
    </div>
`,t=document.createRange().createContextualFragment(e);g()?a.after(t):a.prepend(t)},g=()=>{return window.matchMedia("(max-width: 991px)").matches},h=e=>{e=document.getElementById("post-"+e);return g()?e.querySelector(".entry-excerpt"):e.querySelector(".single-widget-area")};const v=(e,a)=>{const t=new IntersectionObserver((e,t)=>e.forEach(e=>{var t;e.isIntersecting&&(t={id:(e=e.target).dataset.placeId},r?e.dataset.isScrolling&&(r=!1,e.removeAttribute("data-is-scrolling")):I(a,t,!1,!0))}),{rootMargin:"0px 0px 0px 0px"});e.forEach(e=>t.observe(e))},y=(d,p)=>{var e=b().map("map-container-"+d);(m[d]=e).on("load",function(){{var s=d,n=p;let e=document.getElementById("map-widget-"+s),t="",a=e.querySelector(".map-places-container");u[s]={};const o=m[s];let i=!0,l=(n.forEach(e=>{e={id:e.dataset.placeId,title:e.dataset.placeTitle,latitud:parseFloat(e.dataset.placeLatitude),longitud:parseFloat(e.dataset.placeLongitude)};t+=w(e),S(e,s),i&&(o.setView({lat:e.latitud,lng:e.longitud}),i=!1)}),`
    <ul class="wa-item-map-places__list" id="map-places-list-${s}">
    ${t}
    </ul>
    `);var c=document.createRange().createContextualFragment(l),r;a.appendChild(c),document.querySelectorAll(`#map-places-list-${s} > li`).forEach(a=>{a.addEventListener("click",e=>{var t={id:a.dataset.placeId};I(s,t,!0)})})}}),e.setView([i.lat,i.lng],l),b().tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png",{maxZoom:19,attribution:'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(e)},w=e=>{var t=e.title;return`
      <li class="wa-item-map-places__item" data-place-id="${e.id}">${t}</li>
    `},S=(e,t)=>{var a=e.latitud,i=e.longitud,l=m[t],s=(document.getElementById("map-places-container-"+t),document.getElementById("post-"+t),`

        <h4 class="location-item-title">${e.title}</h4>

    `),a=b().marker([a,i],{icon:n}).addTo(l).bindPopup(s);a.on("click",()=>{I(t,e,!0)}),u[t][e.id]=a},I=(e,t,a=!1,i=!1)=>{var l=document.getElementById("map-places-container-"+e),s=document.getElementById("post-"+e),n=m[e],c=u[e][t.id];f(e,t)||(E(e),_(c,!0),c.openPopup(),n.getZoom()<17&&n.setZoom(17),n.setView(c.getLatLng()),g()||l.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"nearest",inline:"start"}),$(s),l.querySelector(`[data-place-id="${t.id}"]`).classList.add("active"),i||g()||s.querySelector(`[data-place-id="${t.id}"]`).scrollIntoView({behavior:"smooth",block:"center",inline:"start"}),a&&(r=!0,s.querySelector(`[data-place-id="${t.id}"]`).setAttribute("data-is-scrolling",!0)))},$=e=>{[...d(e)].forEach(e=>{e.classList.remove("active")})},f=(e,t)=>{return document.getElementById("map-places-container-"+e).querySelector(`[data-place-id="${t.id}"]`).classList.contains("active")},_=(e,t)=>{t?e.setIcon(c):e.setIcon(n)},E=e=>{m[e];Object.entries(u[e]).forEach(([,e])=>{_(e,!1)})};return{init:()=>{e=WA_ThemeSetup.currentID||0,o(e),document.querySelector("body").addEventListener("is.post-load",e=>{e.detail.postID&&(e.detail.infinitescroll,o(e.detail.postID))})}}})()}}]);