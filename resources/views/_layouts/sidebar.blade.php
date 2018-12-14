<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
	<div class="main-menu-content">
		<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
			<li class="navigation-header">
				<span data-i18n="nav.category.layouts">Main Menu</span>
				<i data-toggle="tooltip" data-placement="right" data-original-title="Main Menu" class="icon-ellipsis icon-ellipsis"></i>
			</li>
			<li class="nav-item">
				<a href="{{url('/')}}" class="menu-item"><i class="icon-home3"></i> Dashboard
					{{-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span> --}}
				</a>
			</li>
			<li class="nav-item">
				<a href="javascript:;" class="menu-item"><i class="icon-database"></i> Master</a>
				<ul class="menu-content">
					<li class="nav-item">
						<a href="{{url('dusun')}}" class="menu-item">Dusun</a>
					</li>
					<li class="nav-item">
						<a href="{{url('penduduk')}}" class="menu-item">Penduduk</a>
						{{-- <ul class="menu-content">
							<li >
								<a href="#" class="menu-item">Jenis</a>
							</li>
							<li>
								<a href="#" class="menu-item">Pengujian</a>
							</li>
						</ul> --}}
					</li>
					<li class="nav-item">
						<a href="{{url('kartukeluarga')}}" class="menu-item">Kartu Keluarga</a>
					</li>
					
					<!-- <li><a href="#" data-i18n="nav.templates.vert.main" class="menu-item">Vertical</a>
						<ul class="menu-content">
							<li><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template" data-i18n="nav.templates.vert.classic_menu" class="menu-item">Classic Menu</a></li>
							<li><a href="https://pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-compact-menu-template" data-i18n="nav.templates.vert.compact_menu" class="menu-item">Compact Menu</a></li>
						</ul>
					</li> -->
				</ul>
			</li>
			<li class="nav-item">
				<a href="{{url('kematian')}}" class="menu-item"><i class="icon-flag4"></i> Kematian
					{{-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span> --}}
				</a>
			</li>
			<li class="nav-item">
				<a href="{{url('kelahiran')}}" class="menu-item"><i class="icon-android-add"></i> Kelahiran
					{{-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span> --}}
				</a>
			</li>
			<li class="nav-item">
				<a href="{{url('mutasi')}}" class="menu-item"><i class="icon-loop"></i> Mutasi

					{{-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span> --}}
				</a>
			</li>
			<li class="nav-item">
				<a href="{{url('surat')}}" class="menu-item"><i class="icon-android-drafts"></i> Surat
					{{-- <span class="tag tag tag-primary tag-pill float-xs-right mr-2">5</span> --}}
				</a>
			</li>
		</ul>
	</div>
</div>