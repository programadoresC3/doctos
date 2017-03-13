<!-- menu de la izquierda -->
<div id="menu" class="hidden-print hidden-xs sidebar-blue sidebar-brand-primary">
	<div id="sidebar-fusion-wrapper">
		<div id="brandWrapper" class="custom-logo">
			 <a href="{{ url('/') }}" class="display-block-inline pull-left">
			 	<img src="{{ asset('public/img/logo_255.png') }}" border="0" alt="Centro Estatal de Control de Confianza Certificado">
			 </a>
		</div>
		<div id="logoWrapper">
			<div id="logo"></div>
		</div>
			<ul class="menu list-unstyled">
				<li class="active">
					<a href="{{ url('doctos_index') }}" class="glyphicons notes">
						<i></i><span>Documentos</span>
					</a>
				</li>

				<li >
					<a href="{{ url('incidencias_index') }}" class="glyphicons notes">
						<i></i><span>Incidencias</span>
					</a>
				</li>

				<li >
					<a href="{{ url('informe_index') }}" class="glyphicons notes">
						<i></i><span>Informe por Persona</span>
					</a>
				</li>

				<li class="hasSubmenu">
					<a href="#submenu1" class="glyphicons list" data-toggle="collapse"><i></i>
						Catalogos
					</a>
					<ul id="submenu1" class="collapse">
						<li>
							<a href=""><i class="fa fa-group"></i> Genera</a>
						</li>

						<li>
							<a href=""><i class="fa fa-male"></i> Para</a>
						</li>

					</ul>
				</li>
			</ul>
	</div>
</div>
<!-- fin de menú -->