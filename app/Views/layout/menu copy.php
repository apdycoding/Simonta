<!-- MENU ADMIN  -->
<?php if (session('roleUser') == 'adminsuper') : ?>

    <li class="menu-header">Main Menu</li>
    <li <?= current_url(true)->getSegment(1) == "" ? 'class="active"' : '' ?>>
        <a class="nav-link" href="/"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
    </li>


    <li class="nav-item dropdown <?= current_url(true)->getSegment(1) == 'profilesAdmin' || current_url(true)->getSegment(1) == 'users' ? 'active' : '' ?>">

        <a href="" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Management User</span></a>

        <ul class="dropdown-menu" <?= current_url(true)->getSegment(1) == 'profilesAdmin' ? 'class="active"' : '' ?>>
            <li <?= current_url(true)->getSegment(1) == 'profilesAdmin' ? 'class="active"' : '' ?>><a class="nav-link" href="/profilesAdmin"><i class="fa fa-user"></i> <span>Profiles</span></a></li>

            <li <?= current_url(true)->getSegment(1) == 'users' ? 'class="active"' : '' ?>><a class="nav-link" href="/users"> <i class="fa fa-users"></i> <span>User</span></a></li>
        </ul>
    </li>

    <li class="menu-header">Master Data</li>
    <li class="nav-item dropdown <?= current_url(true)->getSegment(1) == 'kepsek' || current_url(true)->getSegment(1) == 'teacher' || current_url(true)->getSegment(1) == 'staff' || current_url(true)->getSegment(1) == 'santri' ? 'active' : '' ?>">

        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
            <li <?= current_url(true)->getSegment(1) == 'kepsek' ? 'class="active"' : '' ?>><a class="nav-link" href="/kepsek"><i class="fa fa-user"></i> <span>Kep. Sekolah</span></a></li>

            <li <?= current_url(true)->getSegment(1) == 'teacher' ? 'class="active"' : '' ?>><a class="nav-link" href="/teacher"> <i class="fa fa-users"></i> <span>Guru</span></a></li>

            <li <?= current_url(true)->getSegment(1) == 'staff' ? 'class="active"' : '' ?>><a class="nav-link" href="/staff"><i class="fa fa-user-secret"></i> <span>Staff</span></a></li>
            <li <?= current_url(true)->getSegment(1) == 'santri' ? 'class="active"' : '' ?>><a class="nav-link" href="/santri"><i class="fa fa-users"></i> <span>Santri Active </span></a></li>
            <li><a class="nav-link" href="/santri/inactive"><i class="fa fa-user-alt-slash"></i> <span>Santri inActive</span></a></li>
        </ul>
    </li>

    <li class="menu-header"> Data hafalan</li>
    <li class="nav-item dropdown">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data hadits</span></a>
        <ul class="dropdown-menu">

            <li><a class="nav-link" href="/admin/dhadits"><i class="fa fa-book"></i> <span>Hadits</span></a></li>
            <li><a class="nav-link" href="/admin/Datahadits"> <i class="fa fa-book"></i> <span>Data hafalan hadits</span> </a></li>
        </ul>
    </li>

    <li class="nav-item dropdown ">
        <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Data doa</span></a>
        <ul class="dropdown-menu">

            <li><a class="nav-link" href="/admin/Ddoa"><i class="fa fa-book"></i> <span>Doa</span></a></li>
            <li><a class="nav-link" href="/admin/Datadoa"> <i class="fa fa-spinner"></i> <span> Data Hafalan Do'a </span> </a></li>
        </ul>
    </li>
    <li <?= current_url(true)->getSegment(1) == 'HafalanSurah' ? 'class="active"' : '' ?>><a class="nav-link" href="/HafalanSurah"><i class="fa fa-bookmark"></i> <span>Hafalan Surah</span> </a></li>


    <li class="menu-header">Penguji</li>
    <li <?= current_url(true)->getSegment(1) == 'penguji' ? 'class="active"' : '' ?>><a class="nav-link" href="/penguji"><i class="fa fa-people-carry"></i> <span>Penguji</span></a></li>

    <li class="menu-header">Monitoring Anak</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span> Cetak Hafalan</span></a>
        <ul class="dropdown-menu">

            <li><a class="nav-link" href="/hadits"> <i class="fas fa-print"></i> <span>Cetak Hadits</span> </a></li>

            <li><a class="nav-link" href="/doa"> <i class="fas fa-print"></i> <span>Cetak Do'a </span> </a></li>
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

<!-- MENU STAFF -->
<?php if (session('roleUser') == 'staff') : ?>

    <li class="menu-header">Main Menu</li>
    <li class="active"><a class="nav-link" href="<?= site_url() ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

    <!-- <li class="nav-item dropdown">

    <a href="" class="nav-link has-dropdown"><i class="fa fa-database"></i><span>Master Data</span></a>
    <ul class="dropdown-menu"> -->
    <li class="menu-header">Master Data <code> <?= session()->roleUser ?> </code></li>

    <li><a class="nav-link" href="staff/kepsek"><i class="fa fa-user"></i> <span>Kep. Sekolah</span></a></li>
    <li><a class="nav-link" href="/staff/teacher"> <i class="fa fa-users"></i> <span>Guru</span></a></li>
    <li><a class="nav-link" href=""><i class="fa fa-user-secret"></i> <span>Staff</span></a></li>
    <li><a class="nav-link" href="/staff/santri"><i class="fa fa-users"></i> <span>Santri Active </span></a></li>
    <li><a class="nav-link" href="/staff/santri/inactive"><i class="fa fa-user-alt-slash"></i> <span>Santri inActive</span></a></li>

    <!-- </ul>
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