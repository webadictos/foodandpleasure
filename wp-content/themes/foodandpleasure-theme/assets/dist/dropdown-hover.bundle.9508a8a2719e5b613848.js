(self.webpackChunk=self.webpackChunk||[]).push([["dropdown-hover"],{"./js/dropdown-hover.js":function(){window.matchMedia("(max-width: 1199px)").matches?dropdownItems.forEach(function(e){var t=e.nextElementSibling,e=e.getAttribute("href"),n=`
        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item"><a title="View All" href="${e}" class="dropdown-item">View All</a></li>
        `;null!=e&&(e=document.createRange().createContextualFragment(n),t.appendChild(e))}):dropdownItems.forEach(function(t){t.addEventListener("mouseenter",function(e){t.classList.contains("show")||t.classList.add("show")}),t.addEventListener("mouseleave",function(e){t.classList.contains("show")&&t.classList.remove("show")})})}}]);