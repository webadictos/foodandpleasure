(self.webpackChunk=self.webpackChunk||[]).push([["archive-infinite-scroll"],{"./js/archive-infinite-scroll.js":function(){(()=>{const n={api:WA_ThemeSetup.ajaxurl,max_page:WA_ThemeSetup.infinite_scroll.max_page||1,query:WA_ThemeSetup.infinite_scroll.posts,page:WA_ThemeSetup.infinite_scroll.current_page,articlesContainer:".archive-articles-container"};let i=document.querySelector(n.articlesContainer),t=!0;const a=e=>{e=new CustomEvent("is.page-load",{detail:{currentPage:e,infinitescroll:!0}});document.querySelector("body").dispatchEvent(e)},e=async()=>{try{return await(await fetch((e=n.api,t=i.dataset.loadmoreLayout||"flex",a=i.dataset.loadmoreItemLayout||"",a={action:"loadmore_archive",query:n.query,page:n.page,item_layout:a,layout:t},(t=new URL(e)).search=new URLSearchParams(a).toString(),t))).json()}catch(e){console.log(e)}var e,t,a},r=()=>{return window.pageYOffset>i.offsetHeight-i.offsetHeight/2&&1==t&&n.page<n.max_page};return{init:()=>{window.addEventListener("scroll",()=>{r()&&(t=!1,e().then(e=>{e=document.createRange().createContextualFragment(e.data);i.appendChild(e),n.page++,a(n.page),t=!0}))},!1)}}})().init()}}]);