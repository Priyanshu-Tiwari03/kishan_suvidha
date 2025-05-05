<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-dashboard-1"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.deshboard')}}">Dashboard</a></li>
                </ul>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-app"></i>
                    <span class="nav-text">Food</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('Admin.add_food')}}">add Food</a></li>
                    <li><a href="{{route('admin.view_Food')}}">view Food</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-star"></i>
                    <span class="nav-text">Categorie</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('Admin.add_Categorie')}}">New Categorie</a></li>
                    <li><a href="{{route('Admin.add_Categorie')}}">View Categorie</a></li>
                    <li><a href="{{route('Admin.add_Sub_Categorie')}}">New Sub Categorie</a></li>
                    <li><a href="{{route('Admin.add_Categorie')}}">View Sub Categorie</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-form"></i>
                    <span class="nav-text">User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.view_Customer')}}">Customer</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-table"></i>
                    <span class="nav-text">Employee</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('Admin.add_Employee')}}">New Employee</a></li>
                    <li><a href="table-datatable-basic.html">View</a></li>
                </ul>
            </li>

        <li><a class="has-arrow ai-icon" href="{{route('admin.logout')}}" aria-expanded="false">
            <i class="flaticon-enter"></i>
                <span class="nav-text">Logout</span>
            </a>
        </li>
        <div class="copyright">
            <p class="fs-14 font-w200"><strong class="font-w400">Koki Restaurant Admin Dashboard</strong> © 2023 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>