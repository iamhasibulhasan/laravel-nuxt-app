<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{route('dashboard')}}"> <i style="font-size: 15px" class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('cat-page')}}"><i style="font-size: 15px" class="far fa-file"></i> <span>Category</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i style="font-size: 15px" class="fas fa-luggage-cart"></i>  <span> Product </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('product.index')}}"> All product </a></li>
                        <li><a href="{{route('product.add')}}"> Add new product </a></li>
                        <li><a href="{{route('tag.index')}}"> Tags </a></li>
                        <li><a href="{{route('brand.index')}}"> Brands </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
