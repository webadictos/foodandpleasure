"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["map-places"],{"./js/map-places.js":function(e,a,t){t.r(a),t.d(a,{PlacesMap:function(){return s}});const s=(()=>{let s=ThemeSetup.currentID||0,c=document.getElementById("post-"+s),l=c.querySelector(".single-widget-area");return{init:()=>{if(console.log("Inicializando mapa de lugares",s),c){var e=c.querySelectorAll("[data-place-id]");{s;const a=`
    <div class="widget wa_maps_widget">
    <h3 class="widget-title">Casa Pueblo: El hotel más ‘aesthetic’ para hospedarse en Tulum</h3>
    <div id="map-widget-131293" class="map-widget" data-map-id="131293">
        <div class="map-container"></div>
        <div class="map-places-container"></div>
    </div>
</div>`,t=document.createRange().createContextualFragment(a);l.prepend(t)}[...e].forEach(e=>{console.log(e.dataset.placeId)})}}}})()}}]);