"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return s}});const s=(()=>{let c=ThemeSetup.currentID||0,l=document.getElementById("post-"+c),i=l.querySelector(".single-widget-area");return{init:()=>{if(console.log("Inicializando mapa de lugares",c),l){var e=l.querySelectorAll("[data-place-id]");{var a=c;const t=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">Casa Pueblo: El hotel más ‘aesthetic’ para hospedarse en Tulum</h3>
    <div id="map-widget-${a}" class="map-widget" data-map-id="${a}">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,s=document.createRange().createContextualFragment(t);i.prepend(s)}[...e].forEach(e=>{console.log(e.dataset.placeId)})}}}})()}}]);