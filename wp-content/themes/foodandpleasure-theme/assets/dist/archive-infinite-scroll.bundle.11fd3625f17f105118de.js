(self.webpackChunk=self.webpackChunk||[]).push([["archive-infinite-scroll"],{"./js/archive-infinite-scroll.js":function(){(()=>{const n={api:ThemeSetup.ajaxurl,max_page:WA_ThemeSetup.infinite_scroll.max_page||1,query:ThemeSetup.loadmore.posts,page:ThemeSetup.loadmore.current_page,articlesContainer:".archive-articles-container"};let r=document.querySelector(n.articlesContainer),a=!0;const t=e=>{e=new CustomEvent("is.page-load",{detail:{currentPage:e,infinitescroll:!0}});document.querySelector("body").dispatchEvent(e)},e=async()=>{try{return await(await fetch((e=n.api,a=r.dataset.loadmoreLayout||"flex",t=r.dataset.loadmoreItemLayout||"",t={action:"loadmore_archive",query:n.query,page:n.page,item_layout:t,layout:a},(a=new URL(e)).search=new URLSearchParams(t).toString(),a))).json()}catch(e){console.log(e)}var e,a,t},o=()=>{return window.pageYOffset>r.offsetHeight-r.offsetHeight/2&&1==a&&n.page<n.max_page};return{init:()=>{window.addEventListener("scroll",()=>{o()&&(a=!1,e().then(e=>{e=document.createRange().createContextualFragment(e.data);r.appendChild(e),n.page++,t(n.page),a=!0}))},!1)}}})().init()}}]);