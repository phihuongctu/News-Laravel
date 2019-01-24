
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                @if(Auth::user())
                @include('admin.layout.menu')
                <a class="navbar-brand" href="index.html">ADMIN - {{ Auth::user()-> ten }}</a>

            </div>
        

             <ul class="nav navbar-top-links navbar-right">
          
                <li class="dropdown">
                   
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <span class="usr-name">{{ Auth::user()-> ten }}</span>  
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/User/Sua/{{ Auth::user()-> id }}"><i class="fa fa-gear fa-fw"></i>Thiết Lập Tài Khoản</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/Logout"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                    @endif
                    
                </li>
                
            </ul>   
           
        </nav>