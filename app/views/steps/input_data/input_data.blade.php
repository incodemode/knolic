@section('content')


	
	<div>
		<!-- <table>
			<tr>
				<td style="padding:50px;"> -->
					<h2>Iniciar sesión</h2>
					<form action="#" method="post" id="inputData">
						@if($wrongCaptcha)
							<div class="ui-widget" id="errorWidget">
					            <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
					                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
					                <strong id="errorTitle">Error:</strong> 
					                <span id="errorContent">No pudimos comprobar que es un humano.</span></p>
					            </div>
					        </div>
			        	@endif
						@if($wrongUser)
							<div class="ui-widget" id="errorWidget">
					            <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
					                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
					                <strong id="errorTitle">Error:</strong> 
					                <span id="errorContent">No tenemos registro de tu email, corrigelo o crealo segun corresponda.</span></p>
					            </div>
					        </div>
			        	@endif
			        	@if($wrongDate && $startSession)
				        	<div class="ui-widget" id="errorWidget">
								<div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
					                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
					                <strong id="errorTitle">Error:</strong> 
					                <span id="errorContent">El correo que ingresó ya esta siendo usado.</span></p>
					            </div>
					        </div>
				        @endif
						<p> Todos los campos son requeridos para ingresar por primera vez. <p>
						<p>Si ya habias ingresado, solamente coloca tu email y fecha de nacimiento.</p>
						<p>
							@if($email)
								<label for="email" style="display:block"><small>Email</small></label><input type="text" name="email" id="email" value="{{{$email}}}" size="22" data-checkEmailUrl="{{route('ajaxCheckEmail')}}" />
							@else
								<label for="email" style="display:block"><small>Email</small></label><input type="text" name="email" id="email" value="" size="22"  data-checkEmailUrl="{{route('ajaxCheckEmail')}}" />
							@endif
						</p>
						<p>
							@if($name)
								<label for="name" style="display:block"><small>Nombre</small></label>
								<input type="text" name="name" id="name" value="{{{$name}}}" size="22" />
							@else
								<label for="name" style="display:block"><small>Nombre</small></label>
								<input type="text" name="name" id="name" value="" size="22" />
							@endif
							
						</p>
						<p>
							@if($born_date)
								<label for="born_date" style="display:block"><small>Fecha de nacimiento</small></label>
								<input type="text" name="born_date_visible" id="born_date_visible" value="{{{$born_date_visible}}}" size="22" />
								<input type="hidden" name="born_date" id="born_date" value="{{{$born_date}}}"/>
							@else
								<label for="born_date" style="display:block"><small>Fecha de nacimiento</small></label>
								<input type="text" name="born_date_visible" id="born_date_visible" value="" size="22" />
								<input type="hidden" name="born_date" id="born_date"/>
							@endif
						</p>
						<p id="recaptchaLeft">
							<div id="recaptcha" class="g-recaptcha" data-sitekey="6LdCqwgTAAAAALIrlbqtj_ALHSrx0PXdGraIK5rQ" data-hl="es-419"></div>
							<label id="g-recaptcha-response-error" class="error" for="g-recaptcha-response" style="display:block"></label>
							
						</p>
						<p>
							<input type="hidden" name="formName" value="startSession">
							<input type="button" class="greenButton" value="Iniciar sesión" id="startSession">
						</p>
					</form>
				<!-- </td>
				<td style="padding:50px;">
					<h2>Reanudar sessión</h2>
					@if($wrongDate)
						<div class="ui-widget" id="errorWidget">
				            <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
				                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
				                <strong id="errorTitle">Error:</strong> 
				                <span id="errorContent">La fecha que ingresaste no corresponde con la fecha guardada.</span></p>
				            </div>
				        </div>
			        @endif
					<form action="#" method="post" id="reinputData">
						<p>  </p>
						<p>
							<label for="email_reload_session" style="display:block"><small>Email</small></label>
							@if($email)
								<input type="text" name="email" id="email_reload_session" value="{{{$email}}}" size="22" />
							@else
								<input type="text" name="email" id="email_reload_session" value="" size="22" />
							@endif
							
						</p>
						<p>
							<label for="born_date" style="display:block"><small>Fecha de nacimiento</small></label>
							@if($born_date)
								<input type="text" name="born_date_visible" id="born_date_visible_reload_session" value="{{{$born_date_visible}}}" size="22" />
								<input type="hidden" name="born_date" id="born_date_reload_session" value="{{{$born_date_visible}}}"/>
							@else
								<input type="text" name="born_date_visible" id="born_date_visible_reload_session" value="" size="22" />
								<input type="hidden" name="born_date" id="born_date_reload_session" value="{{{$born_date}}}"/>
							@endif
							
							
						</p>
						<p id="recaptchaRight">
						</p>
						<p>
							<input type="hidden" name="formName" value="reloadSession">
							<input type="button" class="blueButton" value="Reanudar sesión" id="reloadSession">
						</p>
					</form>
				</td>
			</tr>
		</table> -->
	</div>




@stop