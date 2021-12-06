<nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                    <li class="menu-title"> <i class="menu-icon fa fa-gears"></i> Pengaturan</li>
                    <li class="menu-item-has-children dropdown">
                        <li >
                            <a href="{{route('divisi.index')}}" class="dropdown-toggle">
                                <i class="menu-icon fa fa-users"></i>Divisi</a>
                        </li>
                        <li>
                            <a href="{{route('suplier.index')}}" class="dropdown-toggle">
                                <i class="menu-icon fa fa-users"></i>Suplier</a>
                        </li>
                        <li>
                            <a href="{{route('satuan-ukuran.index')}}">
                            <i class="menu-icon fa fa-bars"></i>
                            Ukuran</a>
                        </li>
                    </li>
                    <li class="menu-title">Data Master</li>
                    <li >
                        <a href="{{route('master-produk.index')}}" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>Produk</a>
                    </li>
                    <li >
                        <a href="{{route('barang.index')}}" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>Barang</a>
                    </li>

                    <li class="menu-title">Formula Item</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-edit"></i>Formula Item</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="{{route('formula-item.index')}}">Daftar Formula Item</a>
                            </li>
                            <li>
                                <a href="{{route('subitem.index')}}">Group Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-title">Formula Utama</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="menu-icon fa fa-edit"></i>Formula Utama</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="{{route('formula-utama.index')}}">Daftar Formula</a>
                            </li>
                            <li>
                                <a href="{{route('subitem-utama.index')}}">Group Utama</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-title">Surat</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-files-o"></i>Surat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-check-square"></i><a href="font-fontawesome.html">Order</a></li>
                            <li><i class="menu-icon fa fa-bullseye"></i><a href="font-fontawesome.html">Produksi</a></li>
                            <li><i class="menu-icon fa fa-truck"></i><a href="font-fontawesome.html">Jalan</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Pemesanan</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list-alt"></i>Pemesanan Material</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-list-alt"></i><a href="font-fontawesome.html">Material</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Extras</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
