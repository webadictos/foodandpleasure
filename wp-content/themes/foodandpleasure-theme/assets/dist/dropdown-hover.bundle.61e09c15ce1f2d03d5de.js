(self.webpackChunk=self.webpackChunk||[]).push([["dropdown-hover"],{"./js/dropdown-hover.js":function(){var e=document.querySelectorAll('.navbar .nav-item [data-bs-toggle="dropdown"], .navbar .nav-item .dropdown-item');window.matchMedia("(max-width: 1199px)").matches?e.forEach(function(e){var t=e.nextElementSibling,e=e.getAttribute("href"),n=`
        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item"><a title="View All" href="${e}" class="dropdown-item">View All</a></li>
        `;null!=e&&(e=document.createRange().createContextualFragment(n),t.appendChild(e))}):e.forEach(function(t){let n=null,i=t.nextElementSibling;t&&(t.addEventListener("mouseenter",function(e){clearTimeout(n),t.classList.add("show"),i.classList.add("show")}),t.addEventListener("mouseleave",function(e){n=setTimeout(function(){t.classList.remove("show"),i.classList.remove("show")},200)}),i.addEventListener("mouseenter",function(e){clearTimeout(n)}),i.addEventListener("mouseleave",function(e){n=setTimeout(function(){t.classList.remove("show"),i.classList.remove("show")},200)}),t.addEventListener("click",function(e){var t=this;null!=t&&t.href&&(e.preventDefault(),window.location.href=t.href)}),i.addEventListener("transitionend",function(){i.classList.contains("show")||(i.style.display="none")}))})}}]);