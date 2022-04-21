<!-- MENU ADMIN  -->
<?php if (session('roleUser') == 'adminsuper') : ?>

    <!-- <?= current_url(true)->getSegment(1) ?> -->
    <!-- <?= current_url(true)->getSegment(1) == 'home' ? 'class="active"' : '' ?> -->

    <li class="menu-header">Main Menu</li>
    <li <?= current_url(true)->getSegment(1) == 'home' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
    </li>


    <li class="nav-item dropdown <?= current_url(true)->getSegment(1) == 'profilesAdmin' || current_url(true)->getSegment(1) == 'users' ? 'active' : '' ?>">

        <a href="" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Management User</span></a>

        <ul class="dropdown-menu">
            <li <?= current_url(true)->getSegment(1) == 'profilesAdmin' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/profilesAdmin"><i class="fa fa-user"></i> <span>Profiles</span></a>
            </li>

            <li <?= current_url(true)->getSegment(1) == 'users' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/users"> <i class="fa fa-users"></i> <span>User</span></a>
            </li>
        </ul>
    </li>

    <li class="menu-header">Master Data</li>
    <li class="nav-item dropdown <?= current_url(true)->getSegment(1) == 'kepsek' || current_url(true)->getSegment(1) == 'teacher' || current_url(true)->getSegment(1) == 'staff' || current_url(true)->getSegment(1) == 'santri' || current_url(true)->getSegment(2) == 'inactive' ? 'active' : '' ?>">

        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
            <li <?= current_url(true)->getSegment(1) == 'kepsek' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/kepsek"><i class="fa fa-user"></i> <span>Kep. Sekolah</span></a>
            </li>

            <li <?= current_url(true)->getSegment(1) == 'teacher' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/teacher"> <i class="fa fa-users"></i> <span>Guru</span></a>
            </li>

            <li <?= current_url(true)->getSegment(1) == 'staff' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/staff"><i class="fa fa-user-secret"></i> <span>Staff</span></a>
            </li>
            <li <?= current_url(true)->getSegment(1) == 'santri' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/santri"><i class="fa fa-users"></i> <span>Santri Active </span></a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'inactive' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/santri/inactive"><i class="fa fa-user-alt-slash"></i> <span>Santri inActive</span></a>
            </li>
        </ul>
    </li>

    <li class="menu-header"> Data hafalan</li>
    <li class="nav-item dropdown <?= current_url(true)->getSegment(2) == 'dhadits' || current_url(true)->getSegment(2) == 'Datahadits'  ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data hadits</span></a>
        <ul class="dropdown-menu">

            <li <?= current_url(true)->getSegment(2) == 'dhadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/dhadits"><i class="fa fa-book"></i> <span>Hadits</span></a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'Datahadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/Datahadits"> <i class="fa fa-book"></i> <span>Data hafalan hadits</span> </a>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown  <?= current_url(true)->getSegment(2) == 'Ddoa' || current_url(true)->getSegment(2) == 'Datadoa'  ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data doa</span></a>
        <ul class="dropdown-menu">

            <li <?= current_url(true)->getSegment(2) == 'Ddoa' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/Ddoa"><i class="fa fa-book"></i> <span>Doa</span></a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'Datadoa' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/Datadoa"> <i class="fa fa-spinner"></i> <span> Data Hafalan Do'a </span> </a>
            </li>
        </ul>
    </li>
    <li <?= current_url(true)->getSegment(1) == 'HafalanSurah' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/HafalanSurah"><i class="fa fa-bookmark"></i> <span>Hafalan Surah</span> </a>
    </li>


    <li class="menu-header">Penguji</li>
    <li <?= current_url(true)->getSegment(1) == 'penguji' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/penguji"><i class="fa fa-people-carry"></i> <span>Penguji</span></a>
    </li>


    <li class="menu-header">Monitoring Anak</li>
    <li class="nav-item dropdown <?= current_url(true)->getSegment(1) == 'hadits' || current_url(true)->getSegment(1) == 'doa' || current_url(true)->getSegment(2) == 'Reportsurah'  ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span> Cetak Hafalan</span></a>
        <ul class="dropdown-menu">

            <li <?= current_url(true)->getSegment(1) == 'hadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/hadits"> <i class="fas fa-print"></i> <span>Cetak Hadits</span> </a>
            </li>

            <li <?= current_url(true)->getSegment(1) == 'doa' || current_url(true)->getSegment(1) == 'doa'  ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/doa"> <i class="fas fa-print"></i> <span>Cetak Do'a </span> </a>
            </li>

            <li <?= current_url(true)->getSegment(2) == 'Reportsurah' ? 'class="active"' : null ?>>
                <a class="nav-link" href="/admin/Reportsurah"><i class="fas fa-print"> </i> <span>Cetak Surah</span></a>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown <?= current_url(true)->getSegment(2) == 'ReportSantri' || current_url(true)->getSegment(2) == 'ReportHadits' || current_url(true)->getSegment(2) == 'Reportdoa' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan </span></a>
        <ul class="dropdown-menu">

            <!-- <li <?= current_url(true)->getSegment(2) == 'Reportsurah' ? 'class="active"' : null ?>>
                <a class="nav-link" href="/admin/Reportsurah"><i class="fas fa-bookmark"> </i> Lap. Surah</a>
            </li> -->

            <li <?= current_url(true)->getSegment(2) == 'ReportSantri' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/ReportSantri"> <i class="fas fa-file-archive"></i> Lap. data santri</a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'ReportHadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/admin/ReportHadits"><i class="fas fa-bookmark"> </i> Lap. hadits</a>
            </li>

            <li <?= current_url(true)->getSegment(2) == 'Reportdoa' ? 'class="active"' : null ?>>
                <a class="nav-link" href="/admin/Reportdoa"><i class="fas fa-bookmark"> </i> Lap. doa</a>
            </li>
        </ul>
    </li>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-file-export"></i> <span>Export Databases</span>
        </a>
    </div>

<?php endif; ?>

<!-- MENU STAFF -->
<?php if (session('roleUser') == 'staff') : ?>

    <!-- <?= current_url(true)->getSegment(1) ?> -->

    <li class="menu-header">Main Menu</li>
    <li <?= current_url(true)->getSegment(1) == 'home' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
    </li>
    <li <?= current_url(true)->getSegment(2) == 'profile' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/staff/Profilestaff"><i class="fas fa-fire"></i> <span>Profile</span></a>
    </li>

    <!-- <li class="nav-item dropdown">

    <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master Data</span></a>
    <ul class="dropdown-menu"> -->
    <li class="menu-header">Master Data <code> <?= session()->roleUser ?> </code></li>

    <li <?= current_url(true)->getSegment(2) == 'Ksekolah' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/staff/Ksekolah"><i class="fa fa-user"></i> <span>Kep. Sekolah</span></a>
    </li>
    <li <?= current_url(true)->getSegment(2) == 'guru' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/staff/guru"> <i class="fa fa-users"></i> <span>Guru</span></a>
    </li>
    <li <?= current_url(true)->getSegment(2) == 'Santristaff' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/staff/Santristaff"><i class="fa fa-users"></i> <span>Santri Active </span></a>
    </li>
    <li <?= current_url(true)->getSegment(2) == 'Santristaff' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/staff/Santristaff/inactive"><i class="fa fa-user-alt-slash"></i> <span>Santri inActive</span></a>
    </li>

    <!-- </ul>
</li> -->

    <li class="menu-header"> Data hafalan</li>
    <li class="nav-item dropdown <?= current_url(true)->getSegment(2) == 'Datahadits' || current_url(true)->getSegment(2) == 'Masterhadits'  ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data hadits</span></a>
        <ul class="dropdown-menu">

            <li <?= current_url(true)->getSegment(2) == 'Datahadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/staff/Datahadits"><i class="fa fa-book"></i> <span>Hadits</span></a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'Masterhadits' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/staff/Masterhadits"> <i class="fa fa-book"></i> <span>Data hafalan hadits</span> </a>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown  <?= current_url(true)->getSegment(2) == 'Ddoa' || current_url(true)->getSegment(2) == 'Datadoa'  ? 'active' : '' ?>">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data doa</span></a>
        <ul class="dropdown-menu">

            <li <?= current_url(true)->getSegment(2) == 'Datadoa' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/staff/Datadoa"><i class="fa fa-book"></i> <span>Doa</span></a>
            </li>
            <li <?= current_url(true)->getSegment(2) == 'Masterdoa' ? 'class="active"' : '' ?>>
                <a class="nav-link" href="/staff/Masterdoa"> <i class="fa fa-spinner"></i> <span> Data Hafalan Do'a </span> </a>
            </li>
        </ul>
    </li>
    <li <?= current_url(true)->getSegment(1) == 'HafalanSurah' ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/HafalanSurah"><i class="fa fa-bookmark"></i> <span>Hafalan Surah</span> </a>
    </li>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-info-circle"></i> <span>Sistem Monitoring V.1</span>
        </a>
    </div>

<?php endif; ?>

<!-- MENU KEPALA SEKOLAH -->
<?php if (session('roleUser') == 'kepsek') : ?>
    <!-- 
<li class="menu-header">Main Menu</li>
<li class="active"><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

<li class="nav-item dropdown">

    <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master Data</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href=""><i class="fa fa-user"></i> <span>Kep. Sekolah</span></a></li>
        <li><a class="nav-link" href=""> <i class="fa fa-users"></i> <span>Guru</span></a></li>
        <li><a class="nav-link" href=""><i class="fa fa-user-secret"></i> <span>Staff</span></a></li>
        <li><a class="nav-link" href="/santri"><i class="fa fa-users"></i> <span>Santri Active </span></a></li>
        <li><a class="nav-link" href="/santri/inactive"><i class="fa fa-user-alt-slash"></i> <span>Santri inActive</span></a></li>
    </ul>
</li> -->
    <li class="menu-header">Monitoring Anak</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hafalan</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href=""><i class="fa fa-bookmark"></i> <span>Hafalan Surah</span> </a></li>
            <li><a class="nav-link" href=""> <i class="fa fa-book"></i> <span>Halafan Hadits</span> </a></li>
            <li><a class="nav-link" href=""> <i class="fa fa-spinner"></i> <span>Hafalan Do'a </span> </a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan </span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href=""> <i class="fas fa-file-archive"></i> Lap. data santri</a></li>
            <li><a class="nav-link" href=""><i class="fas fa-bookmark"> </i> Lap. hafalan</a></li>
        </ul>
    </li>

<?php endif; ?>


<!-- menu wali santri -->
<?php if (session('roleUser') == 'walisantri') : ?>
    <li class="menu-header">Monitoring Anak</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Hafalan</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href=""><i class="fa fa-bookmark"></i> <span>Hafalan Surah</span> </a></li>
            <li><a class="nav-link" href=""> <i class="fa fa-book"></i> <span>Halafan Hadits</span> </a></li>
            <li><a class="nav-link" href=""> <i class="fa fa-spinner"></i> <span>Hafalan Do'a </span> </a></li>
        </ul>
    </li>



<?php endif; ?>