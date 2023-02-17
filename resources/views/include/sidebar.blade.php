<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo-name">ABC</span>
    </div>
    <ul class="navigation-links">
        <li>
            <a href="{{url('/home')}}">
                <i class='bx bx-grid-alt'></i>
                <span class="link-name">{{__('Dashboard')}}</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{url('/home')}}" class="link-name">{{__('Dashboard')}}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('/categories')}}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link-name">{{__('Categories')}}</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{url('/categories')}}" class="link-name">{{__('Categories')}}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('/subcategories')}}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link-name">{{__('Subcategories')}}</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{url('/subcategories')}}" class="link-name">{{__('Subcategories')}}</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('/products')}}">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link-name">{{__('Products')}}</span>
            </a>
            <ul class="sub-menu">
                <li><a href="{{url('/products')}}" class="link-name">{{__('Products')}}</a></li>
            </ul>
        </li>
    </ul>
    
</div>