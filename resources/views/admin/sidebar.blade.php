 <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.dashboard.index']) ? '' : 'collapsed' }}" href="{{route('admin.dashboard.index')}}">
                 <i class="bi bi-speedometer2"></i>
                 <span>Dashboard</span>
             </a>
         </li>
          {{-- <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.lien_he.index']) ? '' : 'collapsed' }}" href="{{route('admin.lien_he.index')}}">
                 <i class="bi bi-envelope"></i>
                 <span>Liên hệ</span>
             </a>
         </li> --}}
         <li class="nav-item">
            <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.banner.edit']) ? '' : 'collapsed' }}" href="{{ route('admin.banner.edit') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Banner</span>
            </a>
        </li>
        <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.goi_dich_vu.index', 'admin.goi_dich_vu.create', 'admin.goi_dich_vu.edit']) ? '' : 'collapsed' }}" href="{{route('admin.goi_dich_vu.index')}}">
                 <i class="bi bi-box-seam"></i>
                 <span>Gói dịch vụ</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.bai_viet.index', 'admin.bai_viet.create', 'admin.bai_viet.edit']) ? '' : 'collapsed' }}" href="{{route('admin.bai_viet.index')}}">
                 <i class="bi bi-file-earmark-text"></i>
                 <span>Bài viết giới thiệu</span>
             </a>
         </li>
        <li class="nav-item">
             <a class="nav-link {{ in_array(Request::route()->getName(), ['admin.web-config.edit']) ? '' : 'collapsed' }}" href="{{route('admin.web-config.edit')}}">
                 <i class="bi bi-gear"></i>
                 <span>Cài đặt</span>
             </a>
         </li>
        
     </ul>


 </aside>
