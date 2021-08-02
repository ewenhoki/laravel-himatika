<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            @if(auth()->user()->role == 'Admin')
            <li><a href="{{ route('admin.index') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Pengaturan Akun</span>
                </a>
            </li>
            @endif
            <li><a href="index2.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-database"></i>
                    <span class="nav-text">Database</span>
                </a>
            </li>
            <li><a href="request2.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Request</span>
                </a>
            </li>
            <li><a href="javascript:void(0)" class="ai-icon logout" aria-expanded="false">
                    <i class="flaticon-381-exit-2"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->