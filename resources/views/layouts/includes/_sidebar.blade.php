<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @if(auth()->user()->role == 'Admin')
            <li><a href="{{ route('admin.index') }}" class="ai-icon" aria-expanded="false" title="Manajemen User">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Manajemen User</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" title="Permintaan Database">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Permintaan Database</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.student.request') }}">Mahasiswa</a></li>
                    <li><a href="{{ route('admin.alumni.request') }}">Alumni</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" title="Database">
                    <i class="flaticon-381-database"></i>
                    <span class="nav-text">Database</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.student.data') }}">Mahasiswa</a></li>
                    <li><a href="{{ route('admin.alumni.data') }}">Alumni</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.profile') }}" class="ai-icon" aria-expanded="false" title="Pengaturan Akun">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Pengaturan Akun</span>
                </a>
            </li>
            @elseif(auth()->user()->role == 'A')
            <li><a href="{{ route('alumni.index') }}" class="ai-icon" aria-expanded="false" title="Profil">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Profil</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" title="Permintaan Database">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Permintaan Database</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('student.request') }}">Mahasiswa</a></li>
                    <li><a href="{{ route('alumni.request') }}">Alumni</a></li>
                </ul>
            </li>
            @else
            <li><a href="{{ route('student.index') }}" class="ai-icon" aria-expanded="false" title="Profil">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Profil</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" title="Permintaan Database">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Permintaan Database</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('student.request') }}">Mahasiswa</a></li>
                    <li><a href="{{ route('alumni.request') }}">Alumni</a></li>
                </ul>
            </li>
            @endif
            <li><a href="javascript:void(0)" class="ai-icon logout" aria-expanded="false" title="Keluar">
                    <i class="flaticon-381-exit-2"></i>
                    <span class="nav-text">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->